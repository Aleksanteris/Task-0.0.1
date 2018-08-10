<?php
namespace VendorName\ModuleName\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use VendorName\ModuleName\Setup\EavplanetSetupFactory;

class InstallData implements InstallDataInterface
{
    /**
     * @var \VendorName\ModuleName\Setup\EavplanetSetupFactory
     */
    private $eavplanetSetupFactory;

    /**
     * @param \VendorName\ModuleName\Setup\EavplanetSetupFactory $eavplanetSetupFactory
     */
    public function __construct(EavplanetSetupFactory $eavplanetSetupFactory)
    {
        $this->eavplanetSetupFactory = $eavplanetSetupFactory;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavplanetSetup = $this->eavplanetSetupFactory->create(['setup' => $setup]);
        $eavplanetSetup->installEntities();

        $flatTableData = [
            ['name' => 'Play Station', 'price' => 200.55, 'count' => 10],
            ['name' => 'XBox', 'price' => 300.44, 'count' => 17],
            ['name' => 'Nes', 'price' => 50.34, 'count' => 30],
            ['name' => 'Nintendo', 'price' => 100.234, 'count' => 43],
            ['name' => 'Play Station 2', 'price' => 320.622, 'count' => 18],
            ['name' => 'Dendy', 'price' => 300.462, 'count' => 63],
            ['name' => 'Game Boy', 'price' => 15.623, 'count' => 6],
            ['name' => 'Wii', 'price' => 220.632, 'count' => 52],
            ['name' => 'Tetris', 'price' => 10.623, 'count' => 17],
            ['name' => 'Sega', 'price' => 70.623, 'count' => 84]
        ];

        $setup->getConnection()->insertMultiple($setup->getTable('a_flat_table'), $flatTableData);
        $setup->endSetup();
    }
}
