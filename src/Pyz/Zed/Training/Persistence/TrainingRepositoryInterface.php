<?php

namespace Pyz\Zed\Training\Persistence;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\MaterialCollectionTransfer;

interface TrainingRepositoryInterface
{
    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeTransfer;

    public function getMaterials(): MaterialCollectionTransfer;
}