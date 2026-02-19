<?php

namespace PYZ\Zed\MaterialDataImporter;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Spryker\Zed\DataImport\DataImportConfig;

class MaterialDataImporterConfig extends DataImportConfig
{
    public const IMPORT_TYPE_MATERIAL = 'material';
    
    public function getMaterialDataImporterConfiguration(): DataImporterConfigurationTransfer
    {
        return $this->buildImporterConfiguration(
            $this->getDataImportRootPath() . 'common/common/material.csv',
            static::IMPORT_TYPE_MATERIAL
        );
    }
}

