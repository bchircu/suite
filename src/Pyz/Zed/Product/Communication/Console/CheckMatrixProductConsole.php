<?php

namespace Pyz\Zed\Product\Communication\Console;

use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckMatrixProductConsole extends Console
{
    protected const COMMAND_NAME = 'product:check:matrix';

    protected function configure(): void
    {
        $this->setName(static::COMMAND_NAME)
            ->setDescription('Check Matrix movie products in database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $connection = $this->getContainer()->get('propel.connection');
        
        $query = "SELECT sku, id_product_abstract, is_active, is_download FROM spy_product WHERE sku LIKE 'MATRIX%' ORDER BY sku";
        $statement = $connection->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        
        if (empty($products)) {
            $output->writeln('<error>No Matrix products found</error>');
            return static::CODE_ERROR;
        }
        
        $output->writeln('<info>Matrix Products Found:</info>');
        $output->writeln('');
        foreach ($products as $product) {
            $output->writeln(sprintf(
                'SKU: %s | Abstract ID: %s | Active: %s | Download: %s',
                $product['sku'],
                $product['id_product_abstract'],
                $product['is_active'] ? 'Yes' : 'No',
                $product['is_download'] ? 'Yes' : 'No'
            ));
        }
        
        return static::CODE_SUCCESS;
    }
}
