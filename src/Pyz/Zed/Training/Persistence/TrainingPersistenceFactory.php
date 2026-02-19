<?php

namespace Pyz\Zed\Training\Persistence;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\Material\Persistence\PyzMaterialQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Pyz\Zed\Training\Persistence\TrainingEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Training\Persistence\TrainingRepositoryInterface getRepository()
 */
class TrainingPersistenceFactory extends AbstractPersistenceFactory
{
    public function createAntelopeQuery(): PyzAntelopeQuery
    {
        return PyzAntelopeQuery::create();
    }

    public function createMaterialQuery(): PyzMaterialQuery
    {
        return PyzMaterialQuery::create();
    }
}
