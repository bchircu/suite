<?php

namespace Pyz\Zed\Material\Persistence;

use Orm\Zed\Material\Persistence\PyzMaterialQuery;
use Orm\Zed\Material\Persistence\PyzProductMaterialQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\Material\Persistence\MaterialRepositoryInterface getRepository()
 */
class MaterialPersistenceFactory extends AbstractPersistenceFactory
{
    public function createProductMaterialQuery(): PyzProductMaterialQuery
    {
        return PyzProductMaterialQuery::create();
    }

    public function createMaterialQuery(): PyzMaterialQuery
    {
        return PyzMaterialQuery::create();
    }
}
