<?php

namespace Pyz\Zed\Material\Communication\Controller;

use Generated\Shared\Transfer\MaterialTransfer;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class CreateController extends AbstractController
{
    protected const URL_MATERIAL_OVERVIEW = '/material';
    protected const MESSAGE_MATERIAL_CREATED_SUCCESS = 'Material was successfully created.';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|array<string,mixed>
     */
    public function indexAction(Request $request): RedirectResponse|array
    {
        $materialCreateForm = $this->getFactory()
            ->createMaterialCreateForm(new MaterialTransfer())
            ->handleRequest($request);

        if ($materialCreateForm->isSubmitted() && $materialCreateForm->isValid()) {
            return $this->createMaterial($materialCreateForm);
        }

        return $this->viewResponse([
            'materialCreateForm' => $materialCreateForm->createView(),
            'backUrl' => $this->getMaterialOverviewUrl(),
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormInterface $materialCreateForm
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function createMaterial(FormInterface $materialCreateForm): RedirectResponse
    {
        /** @var \Generated\Shared\Transfer\MaterialTransfer|null $materialTransfer */
        $materialTransfer = $materialCreateForm->getData();

        $this->getFacade()->createMaterial($materialTransfer);

        $this->addSuccessMessage(static::MESSAGE_MATERIAL_CREATED_SUCCESS);

        return $this->redirectResponse($this->getMaterialOverviewUrl());
    }

    /**
     * @return string
     */
    protected function getMaterialOverviewUrl(): string
    {
        return (string)Url::generate(static::URL_MATERIAL_OVERVIEW);
    }
}
