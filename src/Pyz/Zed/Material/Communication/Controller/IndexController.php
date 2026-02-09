<?php

namespace Pyz\Zed\Material\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method \Pyz\Zed\Material\Communication\MaterialCommunicationFactory getFactory()
 * @method \Pyz\Zed\Material\Business\MaterialFacadeInterface getFacade()
 */
class IndexController extends AbstractController
{
    /**
     * @return array<string,mixed>
     */
    public function indexAction(): array
    {
        $table = $this->getFactory()->createMaterialTable();

        return $this->viewResponse([
            'materialTable' => $table->render(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function tableAction(): JsonResponse
    {
        $table = $this->getFactory()->createMaterialTable();

        return $this->jsonResponse($table->fetchData());
    }
}
