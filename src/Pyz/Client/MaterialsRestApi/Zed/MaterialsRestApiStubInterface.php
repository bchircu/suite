<?php

namespace Pyz\Client\MaterialsRestApi\Zed;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialsRestApiStubInterface
{
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer;

    public function getMaterials(): MaterialCollectionTransfer;
}
