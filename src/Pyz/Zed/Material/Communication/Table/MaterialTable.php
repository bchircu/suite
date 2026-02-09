<?php

namespace Pyz\Zed\Material\Communication\Table;

use Orm\Zed\Material\Persistence\PyzMaterialQuery;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class MaterialTable extends AbstractTable
{
    public const COL_ID_MATERIAL = 'id_material';
    public const COL_NAME = 'name';

    /**
     * @param \Orm\Zed\Material\Persistence\PyzMaterialQuery $materialQuery
     */
    public function __construct(protected PyzMaterialQuery $materialQuery)
    {
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            static::COL_ID_MATERIAL => 'ID',
            static::COL_NAME => 'Material Name',
        ]);

        $config->setSortable([
            static::COL_ID_MATERIAL,
            static::COL_NAME,
        ]);

        $config->setSearchable([
            static::COL_NAME,
        ]);

        return $config;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     * @return array<int,array<string,mixed>>
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $materialEntityCollection = $this->runQuery(
            $this->materialQuery,
            $config,
            true
        );

        if (!$materialEntityCollection->count()) {
            return [];
        }

        $results = [];
        foreach ($materialEntityCollection as $materialEntity) {
            $results[] = [
                static::COL_ID_MATERIAL => $materialEntity->getIdMaterial(),
                static::COL_NAME => $materialEntity->getName(),
            ];
        }

        return $results;
    }
}
