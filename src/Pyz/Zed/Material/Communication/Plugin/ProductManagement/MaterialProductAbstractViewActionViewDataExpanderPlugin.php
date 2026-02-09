<?php

namespace Pyz\Zed\Material\Communication\Plugin\ProductManagement;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductAbstractViewActionViewDataExpanderPluginInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractViewActionViewDataExpanderPlugin extends AbstractPlugin implements ProductAbstractViewActionViewDataExpanderPluginInterface
{
    /**
     * @param array<string, mixed> $viewData
     * @return array<string, mixed>
     */
    public function expand(array $viewData): array
    {
        $productAbstractTransfer = $viewData['productAbstract'] ?? null;

        if (!$productAbstractTransfer instanceof ProductAbstractTransfer) {
            return $viewData;
        }

        $idProductAbstract = $productAbstractTransfer->getIdProductAbstract();
        
        if (!$idProductAbstract) {
            return $viewData;
        }

        $material = $this->getFacade()->findMaterialByProductAbstractId($idProductAbstract);
        
        if ($material) {
            $viewData['material'] = $material;
        }

        return $viewData;
    }
}
