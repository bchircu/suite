<?php

namespace Pyz\Zed\Training\Communication\Controller;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Training\Business\TrainingFacadeInterface getFacade()
 */

class GatewayController extends AbstractGatewayController
{
    public function getAntelopeAction(AntelopeCriteriaTransfer $antelopeCriteria) : AntelopeResponseTransfer
    {
        return $this->getFacade()
            ->getAntelope($antelopeCriteria);
    }
    
    public function createMaterialAction(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->getFacade()->createMaterial($materialTransfer);
    }

    public function getMaterialsAction(MaterialCollectionTransfer $materialCollectionTransfer): MaterialCollectionTransfer
    {
        return $this->getFacade()->getMaterials();
    }
}