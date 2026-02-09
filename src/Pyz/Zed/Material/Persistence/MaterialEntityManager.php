<?php

namespace Pyz\Zed\Material\Persistence;

use Generated\Shared\Transfer\MaterialTransfer;
use Orm\Zed\Material\Persistence\PyzMaterial;
use Orm\Zed\Material\Persistence\PyzProductMaterialQuery;
use Orm\Zed\Material\Persistence\PyzProductMaterial;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Pyz\Zed\Material\Persistence\MaterialPersistenceFactory getFactory()
 */
class MaterialEntityManager extends AbstractEntityManager implements MaterialEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\MaterialTransfer $materialTransfer
     * @return \Generated\Shared\Transfer\MaterialTransfer
     */
    public function createMaterial(MaterialTransfer $materialTransfer): MaterialTransfer
    {
        $materialEntity = new PyzMaterial();
        $materialEntity->setName($materialTransfer->getName());
        $materialEntity->save();

        $materialTransfer->setIdMaterial($materialEntity->getIdMaterial());

        return $materialTransfer;
    }

    /**
     * @param int $idProductAbstract
     * @param int $idMaterial
     * @return void
     */
    public function assignMaterialToProductAbstract(int $idProductAbstract, int $idMaterial): void
    {
        // Get all concrete products for this abstract
        $productIds = SpyProductQuery::create()
            ->filterByFkProductAbstract($idProductAbstract)
            ->select(['IdProduct'])
            ->find()
            ->toArray();

        foreach ($productIds as $idProduct) {
            // Check if assignment already exists
            $existingAssignment = PyzProductMaterialQuery::create()
                ->filterByFkProduct($idProduct)
                ->findOne();

            if ($existingAssignment) {
                // Update existing
                $existingAssignment->setFkMaterial($idMaterial);
                $existingAssignment->save();
            } else {
                // Create new
                $productMaterial = new PyzProductMaterial();
                $productMaterial->setFkProduct($idProduct);
                $productMaterial->setFkMaterial($idMaterial);
                $productMaterial->save();
            }
        }
    }
}
