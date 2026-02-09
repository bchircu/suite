<?php

namespace Pyz\Zed\Material\Communication\Reader;

use Orm\Zed\Material\Persistence\PyzMaterialQuery;

class MaterialReader
{
    /**
     * @return array<string, int>
     */
    public function getMaterialList(): array
    {
        $materialEntities = PyzMaterialQuery::create()->find();

        $choices = [];
        foreach ($materialEntities as $materialEntity) {
            // Symfony ChoiceType expects: 'Display Label' => value
            $choices[$materialEntity->getName()] = $materialEntity->getIdMaterial();
        }

        return $choices;
    }
}
