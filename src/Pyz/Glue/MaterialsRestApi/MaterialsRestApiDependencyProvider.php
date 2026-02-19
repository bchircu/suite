<?php

namespace Pyz\Glue\MaterialsRestApi;

use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class MaterialsRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_MATERIALS_REST_API = 'CLIENT_MATERIALS_REST_API';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $container = $this->addMaterialsRestApiClient($container);

        return $container;
    }

    protected function addMaterialsRestApiClient(Container $container): Container
    {
        $container->set(static::CLIENT_MATERIALS_REST_API, function (Container $container) {
            return $container->getLocator()->materialsRestApi()->client();
        });

        return $container;
    }
}
