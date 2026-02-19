<?php

namespace Pyz\Zed\Training\Persistence;

use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\MaterialTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelope;
use Orm\Zed\Material\Persistence\PyzMaterial;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class TrainingEntityManager extends AbstractEntityManager implements TrainingEntityManagerInterface
{
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        $antelopeEntity = new PyzAntelope();
        $antelopeEntity->fromArray($antelopeTransfer->modifiedToArray());
        $antelopeEntity->save();
        
        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }
    
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        $materialEntity = new PyzMaterial();
        $materialEntity->fromArray($materialTransfer->modifiedToArray());
        $materialEntity->save();
        
        return $materialTransfer->fromArray($materialEntity->toArray(), true);
    }
}