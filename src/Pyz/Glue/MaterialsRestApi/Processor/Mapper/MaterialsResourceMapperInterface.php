<?php

namespace Pyz\Glue\MaterialsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\MaterialTransfer;
use Generated\Shared\Transfer\RestMaterialsAttributesTransfer;

interface MaterialsResourceMapperInterface
{
    public function mapMaterialTransferToRestMaterialsAttributesTransfer(
        MaterialTransfer $materialTransfer,
        RestMaterialsAttributesTransfer $restMaterialsAttributesTransfer
    ): RestMaterialsAttributesTransfer;

    public function mapRestMaterialsAttributesTransferToMaterialTransfer(
        RestMaterialsAttributesTransfer $restMaterialsAttributesTransfer,
        MaterialTransfer $materialTransfer
    ): MaterialTransfer;
}
