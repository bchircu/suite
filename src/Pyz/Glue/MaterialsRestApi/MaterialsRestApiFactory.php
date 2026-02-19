<?php

namespace Pyz\Glue\MaterialsRestApi;

use Pyz\Client\MaterialsRestApi\MaterialsRestApiClientInterface;
use Pyz\Glue\MaterialsRestApi\Processor\Materials\MaterialsReader;
use Pyz\Glue\MaterialsRestApi\Processor\Materials\MaterialsReaderInterface;
use Pyz\Glue\MaterialsRestApi\Processor\Materials\MaterialsWriter;
use Pyz\Glue\MaterialsRestApi\Processor\Materials\MaterialsWriterInterface;
use Pyz\Glue\MaterialsRestApi\Processor\Mapper\MaterialsResourceMapper;
use Pyz\Glue\MaterialsRestApi\Processor\Mapper\MaterialsResourceMapperInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class MaterialsRestApiFactory extends AbstractFactory
{
    public function createMaterialsWriter(): MaterialsWriterInterface
    {
        return new MaterialsWriter(
            $this->getMaterialsRestApiClient(),
            $this->createMaterialsResourceMapper(),
            $this->getResourceBuilder()
        );
    }

    public function createMaterialsReader(): MaterialsReaderInterface
    {
        return new MaterialsReader(
            $this->getMaterialsRestApiClient(),
            $this->createMaterialsResourceMapper(),
            $this->getResourceBuilder()
        );
    }

    public function createMaterialsResourceMapper(): MaterialsResourceMapperInterface
    {
        return new MaterialsResourceMapper();
    }

    public function getMaterialsRestApiClient(): MaterialsRestApiClientInterface
    {
        return $this->getProvidedDependency(MaterialsRestApiDependencyProvider::CLIENT_MATERIALS_REST_API);
    }
}
