<?php

namespace Pyz\Zed\Product\Communication\Console;

use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckProductAttributesConsole extends Console
{
    protected const COMMAND_NAME = 'product:check:attributes';
    protected const DESCRIPTION = 'Checks attributes JSON for LOTR products';

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productAbstract = SpyProductAbstractQuery::create()
            ->filterBySku('LOTR-001')
            ->findOne();

        if ($productAbstract) {
            $output->writeln(sprintf('Abstract (LOTR-001) attributes: %s', $productAbstract->getAttributes()));
        }

        $products = SpyProductQuery::create()
            ->filterByFkProductAbstract($productAbstract->getIdProductAbstract())
            ->find();

        foreach ($products as $product) {
            $output->writeln(sprintf('Variant %s attributes: %s', $product->getSku(), $product->getAttributes()));
        }

        return static::CODE_SUCCESS;
    }
}
