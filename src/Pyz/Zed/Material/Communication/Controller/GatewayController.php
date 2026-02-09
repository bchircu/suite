<?php

namespace Pyz\Zed\Material\Communication\Controller;

use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    public function getMaterialByProductIdAction(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        $idProduct = $materialTransfer->getIdProduct();
        
        return $this->getFacade()->findMaterialByProductId($idProduct) ?? new MaterialTransfer();
    }
}
