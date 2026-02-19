<?php

namespace Pyz\Zed\MaterialsRestApi\Communication\Controller;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\MaterialsRestApi\Communication\MaterialsRestApiCommunicationFactory getFactory()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * Creates a material using the Material module facade (same backend as backoffice).
     *
     * @param \Generated\Shared\Transfer\MaterialTransfer $materialTransfer
     * @return \Generated\Shared\Transfer\MaterialTransfer
     */
    public function createMaterialAction(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->getFactory()
            ->getMaterialFacade()
            ->createMaterial($materialTransfer);
    }

    /**
     * Gets materials using the Material module facade (same backend as backoffice).
     *
     * @param \Generated\Shared\Transfer\MaterialCollectionTransfer $materialCollectionTransfer
     * @return \Generated\Shared\Transfer\MaterialCollectionTransfer
     */
    public function getMaterialsAction(MaterialCollectionTransfer $materialCollectionTransfer): MaterialCollectionTransfer
    {
        return $this->getFactory()
            ->getMaterialFacade()
            ->getMaterials();
    }
}
