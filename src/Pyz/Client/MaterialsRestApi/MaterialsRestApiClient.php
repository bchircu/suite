<?php

namespace Pyz\Client\MaterialsRestApi;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\MaterialsRestApi\MaterialsRestApiFactory getFactory()
 */
class MaterialsRestApiClient extends AbstractClient implements MaterialsRestApiClientInterface
{
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->getFactory()
            ->createZedMaterialsRestApiStub()
            ->createMaterial($materialTransfer);
    }

    public function getMaterials(): MaterialCollectionTransfer
    {
        return $this->getFactory()
            ->createZedMaterialsRestApiStub()
            ->getMaterials();
    }
}
