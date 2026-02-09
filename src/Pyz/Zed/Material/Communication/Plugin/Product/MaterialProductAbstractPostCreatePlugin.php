<?php

namespace Pyz\Zed\Material\Communication\Plugin\Product;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductExtension\Dependency\Plugin\ProductAbstractPostCreatePluginInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractPostCreatePlugin extends AbstractPlugin implements ProductAbstractPostCreatePluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function postCreate(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        $idMaterial = $productAbstractTransfer->getIdMaterial();
        
        if ($idMaterial === null || $idMaterial === '' || $idMaterial === 0) {
            return $productAbstractTransfer;
        }

        $this->getFacade()->assignMaterialToProductAbstract(
            $productAbstractTransfer->getIdProductAbstract(),
            (int)$idMaterial
        );

        return $productAbstractTransfer;
    }
}
