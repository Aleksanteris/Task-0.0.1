<?php
namespace VendorName\ModuleName\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
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
        $eavEntityTypeData = [
            ['entity_type_code' => 'planet'],
            ['entity_type_code' => 'spaceship']
        ];
        $eavAttributeData = [
            ['entity_type_id' => 1,'attribute_code' => 'name', 'backend_type' => 'text'],
            ['entity_type_id' => 1,'attribute_code' => 'radius', 'backend_type' => 'decimal'],
            ['entity_type_id' => 2,'attribute_code' => 'name', 'backend_type' => 'text'],
            ['entity_type_id' => 2,'attribute_code' => 'cost', 'backend_type' => 'decimal']
        ];
        $planetEntityData = [
            ['entity_type_id' => 1],
            ['entity_type_id' => 1],
            ['entity_type_id' => 1]
        ];
        $planetEntityTextData = [
            ['entity_type_id' => 1,'entity_id' => 1, 'attribute_id' => 1, 'value' => 'Mars'],
            ['entity_type_id' => 1,'entity_id' => 2, 'attribute_id' => 1, 'value' => 'Jupiter'],
            ['entity_type_id' => 1,'entity_id' => 3, 'attribute_id' => 1, 'value' => 'Earth']

        ];
        $planetEntityDecimalData = [
            ['entity_type_id' => 1,'entity_id' => 1, 'attribute_id' => 2, 'value' => 100.523],
            ['entity_type_id' => 1,'entity_id' => 2, 'attribute_id' => 2, 'value' => 200.632],
            ['entity_type_id' => 1,'entity_id' => 3, 'attribute_id' => 2, 'value' => 300.324]
        ];
        $spaceshipEntityData = [
            ['entity_type_id' => 2],
            ['entity_type_id' => 2],
            ['entity_type_id' => 2]
        ];
        $spaceshipEntityTextData = [
            ['entity_type_id' => 2,'entity_id' => 1, 'attribute_id' => 3, 'value' => 'Chalenger'],
            ['entity_type_id' => 2,'entity_id' => 2, 'attribute_id' => 3, 'value' => 'Buran'],
            ['entity_type_id' => 2,'entity_id' => 3, 'attribute_id' => 3, 'value' => 'X-38']

        ];
        $spaceshipEntityDecimalData = [
            ['entity_type_id' => 2,'entity_id' => 1, 'attribute_id' => 4, 'value' => 700.562],
            ['entity_type_id' => 2,'entity_id' => 2, 'attribute_id' => 4, 'value' => 800.346],
            ['entity_type_id' => 2,'entity_id' => 3, 'attribute_id' => 4, 'value' => 900.326]
        ];

        $setup->getConnection()->insertMultiple($setup->getTable('a_flat_table'), $flatTableData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_eav_entity_type'), $eavEntityTypeData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_eav_attribute'), $eavAttributeData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_planet_entity'), $planetEntityData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_planet_entity_text'), $planetEntityTextData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_planet_entity_decimal'), $planetEntityDecimalData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_spaceship_entity'), $spaceshipEntityData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_spaceship_entity_text'), $spaceshipEntityTextData);
        $setup->getConnection()->insertMultiple($setup->getTable('a_spaceship_entity_decimal'), $spaceshipEntityDecimalData);
        $setup->endSetup();
    }
}
