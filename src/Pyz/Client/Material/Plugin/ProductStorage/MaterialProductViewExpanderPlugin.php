<?php

namespace Pyz\Client\Material\Plugin\ProductStorage;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorage\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * @method \Pyz\Client\Material\MaterialClientInterface getClient()
 */
class MaterialProductViewExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName): ProductViewTransfer
    {
        $idProduct = $productViewTransfer->getIdProductConcrete();

        if (!$idProduct) {
            return $productViewTransfer;
        }

        $materialTransfer = $this->getClient()->getMaterialByProductId($idProduct);

        if ($materialTransfer) {
            $productViewTransfer->setMaterial($materialTransfer->getName());
        }

        return $productViewTransfer;
    }
}
