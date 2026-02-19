<?php

namespace Pyz\Client\MaterialsRestApi;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;

interface MaterialsRestApiClientInterface
{
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer;

    public function getMaterials(): MaterialCollectionTransfer;
}
