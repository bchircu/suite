<?php

namespace Pyz\Client\Material\Zed;

use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialStubInterface
{
    public function getMaterialByProductId(int $idProduct): ?MaterialTransfer;
}
