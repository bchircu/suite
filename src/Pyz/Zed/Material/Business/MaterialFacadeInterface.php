<?php

namespace Pyz\Zed\Material\Business;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialFacadeInterface
{
    /**
     * @param int $idProduct
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductId(int $idProduct): ?MaterialTransfer;

    /**
     * @param int $idProductAbstract
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductAbstractId(int $idProductAbstract): ?MaterialTransfer;

    /**
     * @param \Generated\Shared\Transfer\MaterialTransfer $materialTransfer
     * @return \Generated\Shared\Transfer\MaterialTransfer
     */
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer;

    /**
     * @param int $idProductAbstract
     * @param int $idMaterial
     * @return void
     */
    public function assignMaterialToProductAbstract(int $idProductAbstract, int $idMaterial): void;

    /**
     * @return \Generated\Shared\Transfer\MaterialCollectionTransfer
     */
    public function getMaterials(): MaterialCollectionTransfer;
}