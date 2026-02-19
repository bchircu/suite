<?php

namespace Pyz\Glue\MaterialsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\MaterialTransfer;
use Generated\Shared\Transfer\RestMaterialsAttributesTransfer;

class MaterialsResourceMapper implements MaterialsResourceMapperInterface
{
    public function mapMaterialTransferToRestMaterialsAttributesTransfer(
        MaterialTransfer $materialTransfer,
        RestMaterialsAttributesTransfer $restMaterialsAttributesTransfer
    ): RestMaterialsAttributesTransfer {
        return $restMaterialsAttributesTransfer->fromArray($materialTransfer->toArray(), true);
    }

    public function mapRestMaterialsAttributesTransferToMaterialTransfer(
        RestMaterialsAttributesTransfer $restMaterialsAttributesTransfer,
        MaterialTransfer $materialTransfer
    ): MaterialTransfer {
        return $materialTransfer->fromArray($restMaterialsAttributesTransfer->toArray(), true);
    }
}
