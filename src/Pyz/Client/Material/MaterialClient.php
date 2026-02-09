<?php

namespace Pyz\Client\Material;

use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\Material\MaterialFactory getFactory()
 */
class MaterialClient extends AbstractClient implements MaterialClientInterface
{
    /**
     * @param int $idProduct
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function getMaterialByProductId(int $idProduct): ?MaterialTransfer
    {
        return $this->getFactory()
            ->createZedMaterialStub()
            ->getMaterialByProductId($idProduct);
    }
}
