<?php

namespace Pyz\Glue\MaterialsRestApi\Processor\Materials;

use Generated\Shared\Transfer\RestMaterialsAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;

interface MaterialsWriterInterface
{
    public function createMaterial(RestMaterialsAttributesTransfer $restMaterialsAttributesTransfer): RestResponseInterface;
}
