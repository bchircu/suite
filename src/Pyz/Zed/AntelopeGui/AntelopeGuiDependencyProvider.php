<?php

declare(strict_types=1);

namespace Pyz\Zed\AntelopeGui;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_TRAINING = 'FACADE_TRAINING';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);
        $container = $this->addTrainingFacade($container);

        return $container;
    }

    protected function addTrainingFacade(Container $container): Container
    {
        $container->set(static::FACADE_TRAINING, function (Container $container) {
            return $container->getLocator()->training()->facade();
        });

        return $container;
    }
}
