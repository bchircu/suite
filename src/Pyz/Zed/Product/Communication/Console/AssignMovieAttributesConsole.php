<?php

namespace Pyz\Zed\Product\Communication\Console;

use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AssignMovieAttributesConsole extends Console
{
    protected const COMMAND_NAME = 'product:assign:movie-attributes';
    protected const DESCRIPTION = 'Assigns attributes to LOTR product: release_date, genre on abstract; download_link on digital variant';

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Get abstract product
        $productAbstract = SpyProductAbstractQuery::create()
            ->filterBySku('LOTR-001')
            ->findOne();

        if (!$productAbstract) {
            $output->writeln('<error>Product abstract LOTR-001 not found!</error>');
            return static::CODE_ERROR;
        }

        // Set abstract product attributes (inherited by all variants)
        $abstractAttributes = [
            'release_date' => '2001-12-19',
            'genre' => 'Fantasy',
        ];

        $productAbstract->setAttributes(json_encode($abstractAttributes));
        $productAbstract->save();

        $output->writeln(sprintf('Updated abstract product LOTR-001 with attributes: release_date=%s, genre=%s', 
            $abstractAttributes['release_date'], 
            $abstractAttributes['genre']
        ));

        // Get Blu-ray variant
        $productBluray = SpyProductQuery::create()
            ->filterBySku('LOTR-001-BLURAY')
            ->findOne();

        if ($productBluray) {
            // Blu-ray doesn't need download_link
            $blurayAttributes = [
                'format' => 'Blu-ray',
            ];
            $productBluray->setAttributes(json_encode($blurayAttributes));
            $productBluray->save();
            $output->writeln('Updated Blu-ray variant attributes');
        }

        // Get digital variant
        $productDownload = SpyProductQuery::create()
            ->filterBySku('LOTR-001-DIGITAL')
            ->findOne();

        if ($productDownload) {
            // Digital variant gets download_link
            $downloadAttributes = [
                'format' => 'Digital Download',
                'download_link' => 'https://example.com/download/lotr-fellowship',
            ];
            $productDownload->setAttributes(json_encode($downloadAttributes));
            $productDownload->save();
            $output->writeln('Updated digital variant with download_link attribute');
        }

        $output->writeln('<info>Successfully assigned attributes to LOTR products!</info>');
        $output->writeln('<comment>Note: Run queue:worker:start to publish changes to Redis/Elasticsearch</comment>');

        return static::CODE_SUCCESS;
    }
}
