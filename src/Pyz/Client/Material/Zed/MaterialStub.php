<?php

namespace Pyz\Client\Material\Zed;

use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class MaterialStub implements MaterialStubInterface
{
    public function __construct(protected ZedRequestClientInterface $zedRequestClient)
    {
    }

    public function getMaterialByProductId(int $idProduct): ?MaterialTransfer
    {
        $materialTransfer = new MaterialTransfer();
        $materialTransfer->setIdProduct($idProduct);

        /** @var \Generated\Shared\Transfer\MaterialTransfer $materialTransfer */
        $materialTransfer = $this->zedRequestClient->call(
            '/material/gateway/get-material-by-product-id',
            $materialTransfer
        );

        return $materialTransfer->getIdMaterial() ? $materialTransfer : null;
    }
}
