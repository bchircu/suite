<?php

namespace Pyz\Zed\MaterialsRestApi\Communication;

use Pyz\Zed\Material\Business\MaterialFacadeInterface;
use Pyz\Zed\MaterialsRestApi\MaterialsRestApiDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class MaterialsRestApiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * Returns the Material facade - same backend used by backoffice for saving materials.
     *
     * @return \Pyz\Zed\Material\Business\MaterialFacadeInterface
     */
    public function getMaterialFacade(): MaterialFacadeInterface
    {
        return $this->getProvidedDependency(MaterialsRestApiDependencyProvider::FACADE_MATERIAL);
    }
}
