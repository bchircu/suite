<?php

namespace Pyz\Zed\AntelopeDataImporter\Communication\Plugin\DataImport;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Pyz\Zed\AntelopeDataImporter\AntelopeDataImporterConfig;
use Spryker\Zed\DataImport\Dependency\Plugin\DataImportPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Pyz\Zed\AntelopeDataImporter\Business\AntelopeDataImporterFacadeInterface getFacade()
 * @method \Pyz\Zed\AntelopeDataImporter\AntelopeDataImporterConfig getConfig()
 */
class AntelopeDataImportPlugin extends AbstractPlugin implements DataImportPluginInterface
{
    public function import(?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null): DataImporterReportTransfer
    {
        if ($dataImporterConfigurationTransfer === null) {
            $dataImporterConfigurationTransfer = $this->getConfig()->getAntelopeDataImporterConfiguration();
        }
        
        return $this->getFacade()->importAntelope($dataImporterConfigurationTransfer);
    }

    public function getImportType(): string
    {
        return AntelopeDataImporterConfig::IMPORT_TYPE_ANTELOPE;
    }
}