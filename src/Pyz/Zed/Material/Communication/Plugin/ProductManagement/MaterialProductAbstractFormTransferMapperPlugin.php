<?php

namespace Pyz\Zed\Material\Communication\Plugin\ProductManagement;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductAbstractTransferMapperPluginInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractFormTransferMapperPlugin extends AbstractPlugin implements ProductAbstractTransferMapperPluginInterface
{
    protected const FIELD_MATERIAL = 'id_material';

    /**
     * @param array<string, mixed> $formData
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function map(array $formData, ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        if (isset($formData[static::FIELD_MATERIAL]) && $formData[static::FIELD_MATERIAL] !== '' && $formData[static::FIELD_MATERIAL] !== null) {
            $productAbstractTransfer->setIdMaterial((int)$formData[static::FIELD_MATERIAL]);
        }

        return $productAbstractTransfer;
    }
}
