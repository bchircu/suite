<?php

namespace Pyz\Zed\Training\Persistence;

use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\MaterialTransfer;

interface TrainingEntityManagerInterface
{
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;
    
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer;
}