<?php

namespace Pyz\Zed\Training\Business\Material;

use Generated\Shared\Transfer\MaterialCollectionTransfer;

interface MaterialReaderInterface
{
    public function getMaterials(): MaterialCollectionTransfer;
}
