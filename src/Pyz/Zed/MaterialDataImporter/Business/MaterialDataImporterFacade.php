<?php

namespace Pyz\Zed\MaterialDataImporter\Business;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReportTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;
/**
 * @method \Pyz\Zed\MaterialDataImporter\Business\MaterialDataImporterBusinessFactory getFactory()
 * @method \Pyz\Zed\MaterialDataImporter\MaterialDataImporterConfig getConfig()
 */
class MaterialDataImporterFacade extends AbstractFacade implements MaterialDataImporterFacadeInterface
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
    public function importMaterial(
        ?DataImporterConfigurationTransfer $dataImporterConfigurationTransfer = null
    ): DataImporterReportTransfer {
        return $this->getFactory()
            ->createMaterialDataImport($dataImporterConfigurationTransfer)
            ->import($dataImporterConfigurationTransfer);
    }
}
   