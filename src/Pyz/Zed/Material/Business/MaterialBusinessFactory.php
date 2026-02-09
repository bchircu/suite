<?php

namespace Pyz\Zed\Material\Business;

use Pyz\Zed\Material\Business\Reader\MaterialReader;
use Pyz\Zed\Material\Business\Writer\MaterialWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Material\Persistence\MaterialRepositoryInterface getRepository()
 * @method \Pyz\Zed\Material\Persistence\MaterialEntityManagerInterface getEntityManager()
 */
class MaterialBusinessFactory extends AbstractBusinessFactory
{
    public function createMaterialReader(): MaterialReader
    {
        return new MaterialReader(
            $this->getRepository()
        );
    }

    public function createMaterialWriter(): MaterialWriter
    {
        return new MaterialWriter(
            $this->getEntityManager()
        );
    }
}
