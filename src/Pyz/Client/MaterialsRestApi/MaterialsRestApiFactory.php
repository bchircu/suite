<?php

namespace Pyz\Client\MaterialsRestApi;

use Pyz\Client\MaterialsRestApi\Zed\MaterialsRestApiStub;
use Pyz\Client\MaterialsRestApi\Zed\MaterialsRestApiStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\MaterialsRestApi\MaterialsRestApiConfig getConfig()
 */
class MaterialsRestApiFactory extends AbstractFactory
{
    public function createZedMaterialsRestApiStub(): MaterialsRestApiStubInterface
    {
        return new MaterialsRestApiStub($this->getZedRequestClient());
    }

    protected function getZedRequestClient()
    {
        return $this->getProvidedDependency(MaterialsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
