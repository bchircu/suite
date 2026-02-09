<?php

namespace Pyz\Zed\Material\Business\Writer;

use Generated\Shared\Transfer\MaterialTransfer;
use Pyz\Zed\Material\Persistence\MaterialEntityManagerInterface;

class MaterialWriter
{
    /**
     * @param \Pyz\Zed\Material\Persistence\MaterialEntityManagerInterface $materialEntityManager
     */
    public function __construct(protected MaterialEntityManagerInterface $materialEntityManager)
    {
    }

    /**
     * @param \Generated\Shared\Transfer\MaterialTransfer $materialTransfer
     * @return \Generated\Shared\Transfer\MaterialTransfer
     */
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->materialEntityManager->createMaterial($materialTransfer);
    }

    /**
     * @param int $idProductAbstract
     * @param int $idMaterial
     * @return void
     */
    public function assignMaterialToProductAbstract(int $idProductAbstract, int $idMaterial): void
    {
        $this->materialEntityManager->assignMaterialToProductAbstract($idProductAbstract, $idMaterial);
    }
}
