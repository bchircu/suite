<?php

namespace Pyz\Zed\Product\Communication\Console;

use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Product\Persistence\SpyProductAbstractLocalizedAttributes;
use Orm\Zed\Product\Persistence\SpyProductAbstractLocalizedAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\Product\Persistence\SpyProductLocalizedAttributes;
use Orm\Zed\Product\Persistence\SpyProductLocalizedAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateMovieProductConsole extends Console
{
    protected const COMMAND_NAME = 'product:create:movie';
    protected const DESCRIPTION = 'Creates Lord of the Rings movie product with Blu-ray and downloadable variants';

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Create abstract product
        $productAbstract = SpyProductAbstractQuery::create()
            ->filterBySku('LOTR-001')
            ->findOneOrCreate();

        $productAbstract->setSku('LOTR-001');
        $productAbstract->setAttributes('{}');
        $productAbstract->save();

        $output->writeln(sprintf('Created product abstract: %s (ID: %d)', $productAbstract->getSku(), $productAbstract->getIdProductAbstract()));

        // Create localized attributes for abstract product (en_US - locale ID 46)
        $localizedAttributeAbstractEn = SpyProductAbstractLocalizedAttributesQuery::create()
            ->filterByFkProductAbstract($productAbstract->getIdProductAbstract())
            ->filterByFkLocale(46) // en_US
            ->findOneOrCreate();

        $localizedAttributeAbstractEn->setName('Lord of the Rings: The Fellowship of the Ring');
        $localizedAttributeAbstractEn->setDescription('An epic fantasy adventure film');
        $localizedAttributeAbstractEn->setAttributes('{}');
        $localizedAttributeAbstractEn->save();

        // Create localized attributes for abstract product (de_DE - locale ID 66)
        $localizedAttributeAbstractDe = SpyProductAbstractLocalizedAttributesQuery::create()
            ->filterByFkProductAbstract($productAbstract->getIdProductAbstract())
            ->filterByFkLocale(66) // de_DE
            ->findOneOrCreate();

        $localizedAttributeAbstractDe->setName('Der Herr der Ringe: Die Gefährten');
        $localizedAttributeAbstractDe->setDescription('Ein epischer Fantasy-Abenteuerfilm');
        $localizedAttributeAbstractDe->setAttributes('{}');
        $localizedAttributeAbstractDe->save();

        // Create variant 1: Blu-ray (physical)
        $productBluray = SpyProductQuery::create()
            ->filterBySku('LOTR-001-BLURAY')
            ->findOneOrCreate();

        $productBluray->setSku('LOTR-001-BLURAY');
        $productBluray->setFkProductAbstract($productAbstract->getIdProductAbstract());
        $productBluray->setIsActive(true);
        $productBluray->setIsDownload(false); // Physical Blu-ray
        $productBluray->setAttributes('{"format":"Blu-ray"}');
        $productBluray->save();

        $output->writeln(sprintf('Created Blu-ray variant: %s (ID: %d, is_download: false)', $productBluray->getSku(), $productBluray->getIdProduct()));

        // Create localized attributes for Blu-ray (en_US)
        $localizedAttributeBlurayEn = SpyProductLocalizedAttributesQuery::create()
            ->filterByFkProduct($productBluray->getIdProduct())
            ->filterByFkLocale(46) // en_US
            ->findOneOrCreate();

        $localizedAttributeBlurayEn->setName('Lord of the Rings - Blu-ray Edition');
        $localizedAttributeBlurayEn->setDescription('Physical Blu-ray disc');
        $localizedAttributeBlurayEn->setAttributes('{}');
        $localizedAttributeBlurayEn->setIsComplete(true);
        $localizedAttributeBlurayEn->save();

        // Create localized attributes for Blu-ray (de_DE)
        $localizedAttributeBlurayDe = SpyProductLocalizedAttributesQuery::create()
            ->filterByFkProduct($productBluray->getIdProduct())
            ->filterByFkLocale(66) // de_DE
            ->findOneOrCreate();

        $localizedAttributeBlurayDe->setName('Der Herr der Ringe - Blu-ray Edition');
        $localizedAttributeBlurayDe->setDescription('Physische Blu-ray Disc');
        $localizedAttributeBlurayDe->setAttributes('{}');
        $localizedAttributeBlurayDe->setIsComplete(true);
        $localizedAttributeBlurayDe->save();

        // Create variant 2: Downloadable (digital)
        $productDownload = SpyProductQuery::create()
            ->filterBySku('LOTR-001-DIGITAL')
            ->findOneOrCreate();

        $productDownload->setSku('LOTR-001-DIGITAL');
        $productDownload->setFkProductAbstract($productAbstract->getIdProductAbstract());
        $productDownload->setIsActive(true);
        $productDownload->setIsDownload(true); // Downloadable digital version
        $productDownload->setAttributes('{"format":"Digital Download"}');
        $productDownload->save();

        $output->writeln(sprintf('Created downloadable variant: %s (ID: %d, is_download: true)', $productDownload->getSku(), $productDownload->getIdProduct()));

        // Create localized attributes for downloadable (en_US)
        $localizedAttributeDownloadEn = SpyProductLocalizedAttributesQuery::create()
            ->filterByFkProduct($productDownload->getIdProduct())
            ->filterByFkLocale(46) // en_US
            ->findOneOrCreate();

        $localizedAttributeDownloadEn->setName('Lord of the Rings - Digital Download');
        $localizedAttributeDownloadEn->setDescription('Instant digital download');
        $localizedAttributeDownloadEn->setAttributes('{}');
        $localizedAttributeDownloadEn->setIsComplete(true);
        $localizedAttributeDownloadEn->save();

        // Create localized attributes for downloadable (de_DE)
        $localizedAttributeDownloadDe = SpyProductLocalizedAttributesQuery::create()
            ->filterByFkProduct($productDownload->getIdProduct())
            ->filterByFkLocale(66) // de_DE
            ->findOneOrCreate();

        $localizedAttributeDownloadDe->setName('Der Herr der Ringe - Digitaler Download');
        $localizedAttributeDownloadDe->setDescription('Sofortiger digitaler Download');
        $localizedAttributeDownloadDe->setAttributes('{}');
        $localizedAttributeDownloadDe->setIsComplete(true);
        $localizedAttributeDownloadDe->save();

        $output->writeln('<info>Successfully created Lord of the Rings movie with 2 variants!</info>');

        return static::CODE_SUCCESS;
    }
}
