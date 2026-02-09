<?php

namespace Pyz\Zed\Material\Communication\Plugin\ProductManagement;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginUpdateInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractAfterUpdatePlugin extends AbstractPlugin implements ProductAbstractPluginUpdateInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function update(ProductAbstractTransfer $productAbstractTransfer)
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
