<?php

namespace Pyz\Client\Material;

use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialClientInterface
{
    /**
     * @param int $idProduct
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function getMaterialByProductId(int $idProduct): ?MaterialTransfer;
}