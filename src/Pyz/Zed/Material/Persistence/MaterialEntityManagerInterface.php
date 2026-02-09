<?php

namespace Pyz\Zed\Material\Persistence;

use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialEntityManagerInterface
{
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
}
