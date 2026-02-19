<?php

namespace Pyz\Glue\MaterialsRestApi\Plugin\GlueApplication;

use Generated\Shared\Transfer\RestMaterialsAttributesTransfer;
use Pyz\Glue\MaterialsRestApi\MaterialsRestApiConfig;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class MaterialsResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection->addPost('post', false);
        $resourceRouteCollection->addGet('get', false);

        return $resourceRouteCollection;
    }

    public function getResourceType(): string
    {
        return MaterialsRestApiConfig::RESOURCE_MATERIALS;
    }

    public function getController(): string
    {
        return 'materials-resource';
    }

    public function getResourceAttributesClassName(): string
    {
        return RestMaterialsAttributesTransfer::class;
    }
}
