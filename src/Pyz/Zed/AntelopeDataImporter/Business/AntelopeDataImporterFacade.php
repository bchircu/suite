<?php

namespace Pyz\Zed\AntelopeDataImporter\Business;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeDataImporter\Business\AntelopeDataImporterBusinessFactory getFactory()
 * @method \Pyz\Zed\AntelopeDataImporter\AntelopeDataImporterConfig getConfig()
 */
class AntelopeDataImporterFacade extends AbstractFacade implements AntelopeDataImporterFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\DataImporterConfigurationTransfer|null $dataImporterConfigurationTransfer
     *
     * @return \Generated\Shared\Transfer\DataImporterReportTransfer
     */
    public function importAntelope(
        ?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null
    ): DataImporterReportTransfer {
        return $this->getFactory()
            ->createAntelopeDataImport($dataImporterConfigurationTransfer)
            ->import($dataImporterConfigurationTransfer);
    }
}