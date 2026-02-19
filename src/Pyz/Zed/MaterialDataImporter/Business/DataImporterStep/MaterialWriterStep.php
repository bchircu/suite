<?php

namespace Pyz\Zed\MaterialDataImporter\Business\DataImporterStep;

use Orm\Zed\Material\Persistence\PyzMaterialQuery;
use Pyz\Zed\MaterialDataImporter\Business\DataSet\MaterialDataSetInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class MaterialWriterStep implements DataImportStepInterface
{
    public function execute(DataSetInterface $dataSet): void
    {
        $materialEntity = PyzMaterialQuery::create()
            ->filterByName($dataSet[MaterialDataSetInterface::COLUMN_NAME])
            ->findOneOrCreate();

        if ($materialEntity->isNew() || $materialEntity->isModified()) {
            $materialEntity->save();
        }
    }
}