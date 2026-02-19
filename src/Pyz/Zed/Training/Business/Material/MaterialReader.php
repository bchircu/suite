<?php

namespace Pyz\Zed\Training\Business\Material;

use Generated\Shared\Transfer\MaterialCollectionTransfer;
use Pyz\Zed\Training\Persistence\TrainingRepositoryInterface;

class MaterialReader implements MaterialReaderInterface
{
    public function __construct(
        protected TrainingRepositoryInterface $repository
    ) {
    }

    public function getMaterials(): MaterialCollectionTransfer
    {
        return $this->repository->getMaterials();
    }
}
