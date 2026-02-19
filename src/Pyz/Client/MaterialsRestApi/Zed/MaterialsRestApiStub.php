<?php

namespace Pyz\Client\MaterialsRestApi\Zed;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

/**
 * This stub makes RPC calls directly to the MaterialsRestApi Zed Gateway Controller.
 * The MaterialsRestApi GatewayController uses the Material module's facade,
 * which is the same backend used by the backoffice for material save operations.
 */
class MaterialsRestApiStub implements MaterialsRestApiStubInterface
{
    public function __construct(
        protected ZedRequestClientInterface $zedRequestClient
    ) {
    }

    /**
     * Calls MaterialsRestApi GatewayController -> MaterialFacade -> MaterialWriter -> MaterialEntityManager
     */
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->zedRequestClient->call(
            '/materials-rest-api/gateway/create-material',
            $materialTransfer
        );
    }

    /**
     * Calls MaterialsRestApi GatewayController -> MaterialFacade -> MaterialReader -> MaterialRepository
     */
    public function getMaterials(): MaterialCollectionTransfer
    {
        return $this->zedRequestClient->call(
            '/materials-rest-api/gateway/get-materials',
            new MaterialCollectionTransfer()
        );
    }
}
