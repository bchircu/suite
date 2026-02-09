<?php

namespace Pyz\Zed\Material\Communication\Plugin\ProductManagement;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductAbstractEditViewExpanderPluginInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractEditViewExpanderPlugin extends AbstractPlugin implements ProductAbstractEditViewExpanderPluginInterface
{
    /**
     * @param array<string, mixed> $viewData
     * @return array<string, mixed>
     */
    public function expand(array $viewData): array
    {
        $idProductAbstract = $viewData['idProductAbstract'] ?? null;

        if (!$idProductAbstract) {
            return $viewData;
        }

        $material = $this->getFacade()->findMaterialByProductAbstractId($idProductAbstract);
        
        if ($material) {
            $viewData['idMaterial'] = $material->getIdMaterial();
        }

        return $viewData;
    }
}
