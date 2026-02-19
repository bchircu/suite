<?php

namespace Pyz\Glue\MaterialsRestApi\Processor\Materials;

use Generated\Shared\Transfer\MaterialTransfer;
use Generated\Shared\Transfer\RestMaterialsAttributesTransfer;
use Pyz\Client\MaterialsRestApi\MaterialsRestApiClientInterface;
use Pyz\Glue\MaterialsRestApi\MaterialsRestApiConfig;
use Pyz\Glue\MaterialsRestApi\Processor\Mapper\MaterialsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

class MaterialsWriter implements MaterialsWriterInterface
{
    public function __construct(
        protected MaterialsRestApiClientInterface $materialsRestApiClient,
        protected MaterialsResourceMapperInterface $materialsResourceMapper,
        protected RestResourceBuilderInterface $restResourceBuilder
    ) {
    }

    public function createMaterial(RestMaterialsAttributesTransfer $restMaterialsAttributesTransfer): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        if (!$restMaterialsAttributesTransfer->getName()) {
            return $this->createMaterialNameMissingError($restResponse);
        }

        $materialTransfer = $this->materialsResourceMapper->mapRestMaterialsAttributesTransferToMaterialTransfer(
            $restMaterialsAttributesTransfer,
            new MaterialTransfer()
        );

        $materialTransfer = $this->materialsRestApiClient->createMaterial($materialTransfer);

        if (!$materialTransfer->getIdMaterial()) {
            return $this->createMaterialNotSavedError($restResponse);
        }

        return $restResponse->addResource($this->createMaterialRestResource($materialTransfer));
    }

    protected function createMaterialRestResource(MaterialTransfer $materialTransfer): RestResourceInterface
    {
        $restMaterialsAttributesTransfer = $this->materialsResourceMapper->mapMaterialTransferToRestMaterialsAttributesTransfer(
            $materialTransfer,
            new RestMaterialsAttributesTransfer()
        );

        return $this->restResourceBuilder->createRestResource(
            MaterialsRestApiConfig::RESOURCE_MATERIALS,
            $materialTransfer->getIdMaterial(),
            $restMaterialsAttributesTransfer
        );
    }

    protected function createMaterialNameMissingError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorTransfer = $this->restResourceBuilder->createRestErrorMessageTransfer();
        $restErrorTransfer->setCode(MaterialsRestApiConfig::RESPONSE_CODE_MATERIAL_NAME_MISSING);
        $restErrorTransfer->setStatus(400);
        $restErrorTransfer->setDetail(MaterialsRestApiConfig::RESPONSE_DETAIL_MATERIAL_NAME_MISSING);

        return $restResponse->addError($restErrorTransfer);
    }

    protected function createMaterialNotSavedError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorTransfer = $this->restResourceBuilder->createRestErrorMessageTransfer();
        $restErrorTransfer->setCode(MaterialsRestApiConfig::RESPONSE_CODE_MATERIAL_NOT_FOUND);
        $restErrorTransfer->setStatus(500);
        $restErrorTransfer->setDetail('Material could not be saved.');

        return $restResponse->addError($restErrorTransfer);
    }
}
