<?php

namespace Pyz\Glue\MaterialsRestApi\Processor\Materials;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

interface MaterialsReaderInterface
{
    public function getMaterials(): RestResponseInterface;
}
