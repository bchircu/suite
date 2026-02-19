<?php

namespace Pyz\Zed\MaterialsRestApi;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MaterialsRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_MATERIAL = 'FACADE_MATERIAL';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addMaterialFacade($container);

        return $container;
    }

    /**
     * Provides the Material facade - the same backend used by backoffice for material operations.
     *
     * @param \Spryker\Zed\Kernel\Container $container
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMaterialFacade(Container $container): Container
    {
        $container->set(static::FACADE_MATERIAL, function (Container $container) {
            return $container->getLocator()->material()->facade();
        });

        return $container;
    }
}
