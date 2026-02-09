<?php

namespace Pyz\Zed\Material\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class MaterialCreateForm extends AbstractType
{
    public const FIELD_NAME = 'name';

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'material';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array<string,mixed> $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @return $this
     */
    protected function addNameField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'label' => 'Material Name',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }

    /**
     * @return \Symfony\Component\Validator\Constraints\NotBlank
     */
    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank();
    }
}
