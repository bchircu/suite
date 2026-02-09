<?php

namespace Pyz\Zed\Material\Communication\Plugin\ProductManagement;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductAbstractFormDataProviderExpanderPluginInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractFormEditDataProviderExpanderPlugin extends AbstractPlugin implements ProductAbstractFormDataProviderExpanderPluginInterface
{
    protected const FIELD_MATERIAL = 'id_material';

    /**
     * @param array<string, mixed> $formData
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return array<string, mixed>
     */
    public function expand(array $formData, ProductAbstractTransfer $productAbstractTransfer): array
    {
        if (!$productAbstractTransfer->getIdProductAbstract()) {
            return $formData;
        }

        $material = $this->getFacade()->findMaterialByProductAbstractId(
            $productAbstractTransfer->getIdProductAbstract()
        );
        
        if ($material) {
            $formData[static::FIELD_MATERIAL] = $material->getIdMaterial();
        }

        return $formData;
    }
}
