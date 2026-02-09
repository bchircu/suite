<?php

namespace Pyz\Zed\Material\Communication\Plugin\ProductManagement;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductAbstractFormExpanderPluginInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class MaterialProductAbstractFormExpanderPlugin extends AbstractPlugin implements ProductAbstractFormExpanderPluginInterface
{
    protected const FIELD_MATERIAL = 'id_material';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array<string, mixed> $options
     * @return \Symfony\Component\Form\FormBuilderInterface
     */
    public function expand(FormBuilderInterface $builder, array $options): FormBuilderInterface
    {
        $this->addMaterialField($builder, $options);

        return $builder;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array<string, mixed> $options
     * @return $this
     */
    protected function addMaterialField(FormBuilderInterface $builder, array $options): self
    {
        $builder->add(static::FIELD_MATERIAL, ChoiceType::class, [
            'label' => 'Material',
            'placeholder' => 'Select Material',
            'choices' => $this->getMaterialChoices(),
            'required' => false,
        ]);

        return $this;
    }

    /**
     * @return array<string, int>
     */
    protected function getMaterialChoices(): array
    {
        return $this->getFactory()->createMaterialReader()->getMaterialList();
    }
}
