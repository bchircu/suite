<?php

namespace Pyz\Zed\Product\Communication\Console;

use Orm\Zed\Glossary\Persistence\SpyGlossaryKeyQuery;
use Orm\Zed\Glossary\Persistence\SpyGlossaryTranslationQuery;
use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Orm\Zed\ProductAttribute\Persistence\SpyProductManagementAttributeQuery;
use Spryker\Shared\ProductAttribute\ProductAttributeConfig;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProductAttributesConsole extends Console
{
    protected const COMMAND_NAME = 'product:create:attributes';
    protected const DESCRIPTION = 'Creates product attributes: Release Date, Genre, Download Link, isDownload';

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $attributes = [
            [
                'key' => 'release_date',
                'type' => 'text',
                'translations' => [
                    46 => 'Release Date', // en_US
                    66 => 'Erscheinungsdatum', // de_DE
                ],
            ],
            [
                'key' => 'genre',
                'type' => 'text',
                'translations' => [
                    46 => 'Genre', // en_US
                    66 => 'Genre', // de_DE
                ],
            ],
            [
                'key' => 'download_link',
                'type' => 'text',
                'translations' => [
                    46 => 'Download Link', // en_US
                    66 => 'Download-Link', // de_DE
                ],
            ],
            [
                'key' => 'is_download',
                'type' => 'text',
                'translations' => [
                    46 => 'Is Download', // en_US
                    66 => 'Ist Download', // de_DE
                ],
            ],
        ];

        foreach ($attributes as $attributeData) {
            // Create product attribute key
            $attributeKey = SpyProductAttributeKeyQuery::create()
                ->filterByKey($attributeData['key'])
                ->findOneOrCreate();

            $attributeKey->setIsSuper(false);
            $attributeKey->save();

            $output->writeln(sprintf('Created attribute key: %s (ID: %d)', $attributeKey->getKey(), $attributeKey->getIdProductAttributeKey()));

            // Create product management attribute
            $managementAttribute = SpyProductManagementAttributeQuery::create()
                ->filterByFkProductAttributeKey($attributeKey->getIdProductAttributeKey())
                ->findOneOrCreate();

            $managementAttribute->setInputType($attributeData['type']);
            $managementAttribute->setAllowInput(true);
            $managementAttribute->save();

            // Create glossary key for attribute translation
            $glossaryKeyName = ProductAttributeConfig::PRODUCT_ATTRIBUTE_GLOSSARY_PREFIX . $attributeData['key'];
            $glossaryKey = SpyGlossaryKeyQuery::create()
                ->filterByKey($glossaryKeyName)
                ->findOneOrCreate();

            $glossaryKey->save();

            // Create glossary translations
            foreach ($attributeData['translations'] as $idLocale => $translation) {
                $glossaryTranslation = SpyGlossaryTranslationQuery::create()
                    ->filterByFkGlossaryKey($glossaryKey->getIdGlossaryKey())
                    ->filterByFkLocale($idLocale)
                    ->findOneOrCreate();

                $glossaryTranslation->setValue($translation);
                $glossaryTranslation->save();
            }

            $output->writeln(sprintf('  Created glossary translations for: %s', $attributeData['key']));
        }

        $output->writeln('<info>Successfully created all product attributes!</info>');

        return static::CODE_SUCCESS;
    }
}
