<?php

namespace Pyz\Zed\Material\Communication;

use Generated\Shared\Transfer\MaterialTransfer;
use Orm\Zed\Material\Persistence\PyzMaterialQuery;
use Pyz\Zed\Material\Communication\Form\MaterialCreateForm;
use Pyz\Zed\Material\Communication\Reader\MaterialReader;
use Pyz\Zed\Material\Communication\Table\MaterialTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 * @method \Pyz\Zed\Material\Persistence\MaterialRepositoryInterface getRepository()
 */
class MaterialCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @param \Generated\Shared\Transfer\MaterialTransfer $materialTransfer
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createMaterialCreateForm(MaterialTransfer $materialTransfer): FormInterface
    {
        return $this->getFormFactory()->create(
            MaterialCreateForm::class,
            $materialTransfer
        );
    }

    /**
     * @return \Pyz\Zed\Material\Communication\Table\MaterialTable
     */
    public function createMaterialTable(): MaterialTable
    {
        return new MaterialTable(
            $this->getMaterialQuery()
        );
    }

    /**
     * @return \Pyz\Zed\Material\Communication\Reader\MaterialReader
     */
    public function createMaterialReader(): MaterialReader
    {
        return new MaterialReader();
    }

    /**
     * @return \Orm\Zed\Material\Persistence\PyzMaterialQuery
     */
    protected function getMaterialQuery(): PyzMaterialQuery
    {
        return PyzMaterialQuery::create();
    }
}
