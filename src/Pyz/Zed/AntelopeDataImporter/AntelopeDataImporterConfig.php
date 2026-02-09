<?php

namespace Pyz\Zed\AntelopeDataImporter;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Spryker\Zed\DataImport\DataImportConfig;

class AntelopeDataImporterConfig extends DataImportConfig
{
    public const IMPORT_TYPE_ANTELOPE = 'antelope';
    
    public function getAntelopeDataImporterConfiguration(): DataImporterConfigurationTransfer
    {
        return $this->buildImporterConfiguration(
            $this->getDataImportRootPath() . 'common/common/antelope.csv',
            static::IMPORT_TYPE_ANTELOPE
        );
    }
}