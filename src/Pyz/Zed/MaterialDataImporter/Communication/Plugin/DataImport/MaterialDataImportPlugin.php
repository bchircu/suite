<?php

namespace Pyz\Zed\MaterialDataImporter\Communication\Plugin\DataImport;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Pyz\Zed\MaterialDataImporter\MaterialDataImporterConfig;
use Spryker\Zed\DataImport\Dependency\Plugin\DataImportPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
/**
 * @method \Pyz\Zed\MaterialDataImporter\Business\MaterialDataImporterFacadeInterface getFacade()
 * @method \Pyz\Zed\MaterialDataImporter\MaterialDataImporterConfig getConfig()
 */

class MaterialDataImportPlugin extends AbstractPlugin implements DataImportPluginInterface 
{
    public function import(?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null): DataImporterReportTransfer
    {
        if ($dataImporterConfigurationTransfer === null) {
            $dataImporterConfigurationTransfer = $this->getConfig()->getMaterialDataImporterConfiguration();
        }
        
        return $this->getFacade()->importMaterial($dataImporterConfigurationTransfer);
    }

    public function getImportType(): string
    {
        return MaterialDataImporterConfig::IMPORT_TYPE_MATERIAL;
    }
}