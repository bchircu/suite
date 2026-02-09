<?php

namespace Pyz\Zed\Material\Persistence;

use Generated\Shared\Transfer\MaterialTransfer;
use Orm\Zed\Material\Persistence\PyzProductMaterial;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class MaterialRepository extends AbstractRepository implements MaterialRepositoryInterface
{
    /**
     * @param int $idProduct
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductId(int $idProduct): ?MaterialTransfer
    {
        $productMaterialEntity = $this->getFactory()
            ->createProductMaterialQuery()
            ->filterByFkProduct($idProduct)
            ->findOne();

        if (!$productMaterialEntity) {
            return null;
        }

        $idMaterial = $productMaterialEntity->getFkMaterial();
        
        if (!$idMaterial) {
            return null;
        }

        $materialEntity = $this->getFactory()
            ->createMaterialQuery()
            ->filterByIdMaterial($idMaterial)
            ->findOne();

        if (!$materialEntity) {
            return null;
        }

        $materialTransfer = new MaterialTransfer();
        $materialTransfer->setIdMaterial($materialEntity->getIdMaterial());
        $materialTransfer->setName($materialEntity->getName());

        return $materialTransfer;
    }

    /**
     * @param int $idProductAbstract
     * @return \Generated\Shared\Transfer\MaterialTransfer|null
     */
    public function findMaterialByProductAbstractId(int $idProductAbstract): ?MaterialTransfer
    {
        // First, get any product concrete for this abstract
        $productConcreteEntity = \Orm\Zed\Product\Persistence\SpyProductQuery::create()
            ->filterByFkProductAbstract($idProductAbstract)
            ->findOne();

        if (!$productConcreteEntity) {
            return null;
        }

        // Then find the material for that concrete product
        return $this->findMaterialByProductId($productConcreteEntity->getIdProduct());
    }
}