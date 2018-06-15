<?php
namespace VendorName\ModuleName\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {


        $data = [
            ['name' => 'Play Station', 'price' => 200, 'count' => 10],
            ['name' => 'XBox', 'price' => 300, 'count' => 17],
            ['name' => 'Nes', 'price' => 50, 'count' => 30],
            ['name' => 'Nintendo', 'price' => 100, 'count' => 43],
            ['name' => 'Play Station 2', 'price' => 320, 'count' => 18],
            ['name' => 'Dendy', 'price' => 300, 'count' => 63],
            ['name' => 'Game Boy', 'price' => 15, 'count' => 6],
            ['name' => 'Wii', 'price' => 220, 'count' => 52],
            ['name' => 'Tetris', 'price' => 10, 'count' => 17],
            ['name' => 'Sega', 'price' => 70, 'count' => 84]
        ];
        foreach ($data as $bind) {
            $setup->getConnection()
                ->insertForce($setup->getTable('a_flat_table'), $bind);
        }
    }
}