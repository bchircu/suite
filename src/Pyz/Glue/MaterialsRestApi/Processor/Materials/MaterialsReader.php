<?php

namespace Pyz\Glue\MaterialsRestApi\Processor\Materials;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\RestMaterialsAttributesTransfer;
use Pyz\Client\MaterialsRestApi\MaterialsRestApiClientInterface;
use Pyz\Glue\MaterialsRestApi\MaterialsRestApiConfig;
use Pyz\Glue\MaterialsRestApi\Processor\Mapper\MaterialsResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

class MaterialsReader implements MaterialsReaderInterface
{
    public function __construct(
        protected MaterialsRestApiClientInterface $materialsRestApiClient,
        protected MaterialsResourceMapperInterface $materialsResourceMapper,
        protected RestResourceBuilderInterface $restResourceBuilder
    ) {
    }

    public function getMaterials(): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $materialCollectionTransfer = $this->materialsRestApiClient->getMaterials();

        foreach ($materialCollectionTransfer->getMaterials() as $materialTransfer) {
            $restResponse->addResource($this->createMaterialRestResource($materialTransfer));
        }

        return $restResponse;
    }

    protected function createMaterialRestResource($materialTransfer): RestResourceInterface
    {
        $restMaterialsAttributesTransfer = $this->materialsResourceMapper->mapMaterialTransferToRestMaterialsAttributesTransfer(
            $materialTransfer,
            new RestMaterialsAttributesTransfer()
        );

        return $this->restResourceBuilder->createRestResource(
            MaterialsRestApiConfig::RESOURCE_MATERIALS,
            (string)$materialTransfer->getIdMaterial(),
            $restMaterialsAttributesTransfer
        );
    }
}
