<?php

namespace Pyz\Zed\Training\Business;

use Pyz\Zed\Training\Business\Material\MaterialReader;
use Pyz\Zed\Training\Business\Reader\AntelopeReader;
use Pyz\Zed\Training\Business\Writer\AntelopeWriter;
use Pyz\Zed\Training\Business\Writer\MaterialWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Training\Persistence\TrainingEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Training\Persistence\TrainingRepositoryInterface getRepository()
 */

class TrainingBusinessFactory extends AbstractBusinessFactory
{
    public function createAntelopeWriter(): AntelopeWriter
    {
        return new AntelopeWriter(
            $this->getEntityManager()
        );
    }
    
    public function createAntelopeReader(): AntelopeReader
    {
        return new AntelopeReader(
            $this->getRepository()
        );
    }
    
    public function createMaterialWriter(): MaterialWriter
    {
        return new MaterialWriter(
            $this->getEntityManager()
        );
    }

    public function createMaterialReader(): MaterialReader
    {
        return new MaterialReader(
            $this->getRepository()
        );
    }

}