<?php

namespace Pyz\Zed\Training\Business\Writer;

use Generated\Shared\Transfer\MaterialTransfer;
use Pyz\Zed\Training\Persistence\TrainingEntityManagerInterface;

class MaterialWriter
{
    public function __construct(
        protected TrainingEntityManagerInterface $entityManager
    ) {
    }

    public function create(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        return $this->entityManager->createMaterial($materialTransfer);
    }
}
