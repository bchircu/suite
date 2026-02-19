<?php

namespace Pyz\Zed\Material\Persistence;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialRepositoryInterface
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
     * @return \Generated\Shared\Transfer\MaterialCollectionTransfer
     */
    public function getMaterials(): MaterialCollectionTransfer;
}
