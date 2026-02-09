<?php

namespace Pyz\Client\Material;

use Pyz\Client\Material\Zed\MaterialStub;
use Pyz\Client\Material\Zed\MaterialStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class MaterialFactory extends AbstractFactory
{
    public function createZedMaterialStub(): MaterialStubInterface
    {
        return new MaterialStub($this->getZedRequestClient());
    }

    protected function getZedRequestClient()
    {
        return $this->getProvidedDependency(MaterialDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
