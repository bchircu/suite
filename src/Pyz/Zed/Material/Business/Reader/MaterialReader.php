<?php

namespace Pyz\Zed\Material\Business\Reader;

use Generated\Shared\Transfer\MaterialTransfer;
use Pyz\Zed\Material\Persistence\MaterialRepositoryInterface;

class MaterialReader
{
    /**
     * @var \Pyz\Zed\Material\Persistence\MaterialRepositoryInterface
     */
    protected $materialRepository;

    /**
     * @param \Pyz\Zed\Material\Persistence\MaterialRepositoryInterface $materialRepository
     */
    public function __construct(MaterialRepositoryInterface $materialRepository)
    {
        $this->materialRepository = $materialRepository;
    }

    /**
     * @param int $idProduct
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductId(int $idProduct): ?MaterialTransfer
    {
        return $this->materialRepository->findMaterialByProductId($idProduct);
    }

    /**
     * @param int $idProductAbstract
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductAbstractId(int $idProductAbstract): ?MaterialTransfer
    {
        return $this->materialRepository->findMaterialByProductAbstractId($idProductAbstract);
    }

    /**
     * @return \Generated\Shared\Transfer\MaterialCollectionTransfer
     */
    public function getMaterials(): \Generated\Shared\Transfer\MaterialCollectionTransfer
    {
        return $this->materialRepository->getMaterials();
    }
}