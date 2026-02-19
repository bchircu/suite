<?php

namespace Pyz\Glue\MaterialsRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class MaterialsRestApiConfig extends AbstractBundleConfig
{
    public const RESOURCE_MATERIALS = 'materials';
    
    public const RESPONSE_CODE_MATERIAL_NOT_FOUND = '301';
    public const RESPONSE_CODE_MATERIAL_NAME_MISSING = '302';
    public const RESPONSE_CODE_MATERIAL_CREATED = '303';
    
    public const RESPONSE_DETAIL_MATERIAL_NOT_FOUND = 'Material not found.';
    public const RESPONSE_DETAIL_MATERIAL_NAME_MISSING = 'Material name is required.';
    public const RESPONSE_DETAIL_MATERIAL_CREATED = 'Material successfully created.';
}
