<?php

namespace Pyz\Zed\Training\Persistence;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Exception;

/**
 * @method \Pyz\Zed\Training\Persistence\TrainingPersistenceFactory getFactory()
 */
class TrainingRepository extends AbstractRepository implements TrainingRepositoryInterface
    {
    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createAntelopeQuery()
            ->filterByName($antelopeCriteria->getName())
            ->findOne();
        
        if (!$antelopeEntity) {
           throw new Exception('Antelope not found');
        }
        
        $antelopeTransfer = new AntelopeTransfer();
        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }

    public function getMaterials(): MaterialCollectionTransfer
    {
        $materialEntities = $this->getFactory()
            ->createMaterialQuery()
            ->find();

        $materialCollectionTransfer = new MaterialCollectionTransfer();

        foreach ($materialEntities as $materialEntity) {
            $materialTransfer = new MaterialTransfer();
            $materialTransfer->fromArray($materialEntity->toArray(), true);
            $materialCollectionTransfer->addMaterial($materialTransfer);
        }

        return $materialCollectionTransfer;
    }
}
 
 