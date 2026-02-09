<?php

declare(strict_types=1);

namespace Pyz\Zed\AntelopeGui\Communication;

use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Pyz\Zed\AntelopeGui\AntelopeGuiDependencyProvider;
use Pyz\Zed\AntelopeGui\Communication\Form\AntelopeCreateForm;
use Pyz\Zed\AntelopeGui\Communication\Table\AntelopeTable;
use Pyz\Zed\Training\Business\TrainingFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * @method \Pyz\Zed\AntelopeGui\AntelopeGuiConfig getConfig()
 */
class AntelopeGuiCommunicationFactory extends AbstractCommunicationFactory
{
    public function createAntelopeCreateForm(AntelopeTransfer $antelopeTransfer): FormInterface
    {
        return $this->getFormFactory()->create(
            AntelopeCreateForm::class,
            $antelopeTransfer
        );
    }

    public function createAntelopeTable(): AntelopeTable
    {
        return new AntelopeTable(
            $this->getAntelopeQuery()
        );
    }

    public function getAntelopeFacade(): TrainingFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeGuiDependencyProvider::FACADE_TRAINING);
    }

    protected function getAntelopeQuery(): PyzAntelopeQuery
    {
        return PyzAntelopeQuery::create();
    }
}
