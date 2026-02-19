<?php

namespace Pyz\Zed\Material\Business;

use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Material\Business\MaterialBusinessFactory getFactory()
 */
class MaterialFacade extends AbstractFacade implements MaterialFacadeInterface
{
    /**
     * @param int $idProduct
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductId(int $idProduct): ?MaterialTransfer
    {
        return $this->getFactory()
            ->createMaterialReader()
            ->findMaterialByProductId($idProduct);
    }

    /**
     * @param int $idProductAbstract
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductAbstractId(int $idProductAbstract): ?MaterialTransfer
    {
        return $this->getFactory()
            ->createMaterialReader()
            ->findMaterialByProductAbstractId($idProductAbstract);
    }

    /**
     * @param \Generated\Shared\Transfer\MaterialTransfer $materialTransfer
     * @return \Generated\Shared\Transfer\MaterialTransfer
     */
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->getFactory()
            ->createMaterialWriter()
            ->createMaterial($materialTransfer);
    }

    /**
     * @param int $idProductAbstract
     * @param int $idMaterial
     * @return void
     */
    public function assignMaterialToProductAbstract(int $idProductAbstract, int $idMaterial): void
    {
        $this->getFactory()
            ->createMaterialWriter()
            ->assignMaterialToProductAbstract($idProductAbstract, $idMaterial);
    }

    /**
     * @return \Generated\Shared\Transfer\MaterialCollectionTransfer
     */
    public function getMaterials(): \Generated\Shared\Transfer\MaterialCollectionTransfer
    {
        return $this->getFactory()
            ->createMaterialReader()
            ->getMaterials();
    }
}