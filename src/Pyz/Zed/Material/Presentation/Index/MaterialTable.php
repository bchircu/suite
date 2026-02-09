<?php

namespace Pyz\Zed\Material\Presentation\Index;

use Orm\Zed\Material\Persistence\PyzMaterialQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class MaterialTable extends AbstractTable
{
    public function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            'id_material' => 'ID',
            'name' => 'Material Name',
        ]);

        return $config;
    }

    protected function prepareData(TableConfiguration $config): array
    {
        $query = PyzMaterialQuery::create();

        $queryResults = $this->runQuery($query, $config);

        $results = [];
        foreach ($queryResults as $item) {
            $results[] = [
                'id_material' => $item->getIdMaterial(),
                'name' => $item->getName(),
            ];
        }

        return $results;
    }
}