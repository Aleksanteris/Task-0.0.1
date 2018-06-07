<?php
namespace VendorName\ModuleName\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Префикс 'a' в названии всех таблиц(flat and EAV) используется для первоочередного и последовательного их отображения в "Workbench".

        //====================FLAT_SIMPLE_TABLE===============================================================
        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_flat_table'))
            ->addColumn(
                'goods_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary'  => true, 'unsigned' => true,],
                'goods_id'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'name'
            )
            ->addColumn(
                'price',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '6,3',
                [],
                'price'
            )
            ->addColumn(
                'count',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'count'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated At')
            ->setComment('flat_table');
        $setup->getConnection()->createTable($table);





        //====================EAV_ENTITY_TYPE===============================================================
        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_eav_entity_type'))
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'entity_type_id'
            )
            ->addColumn(
                'entity_type_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'entity_type_code'
            )
            ->setComment('eav_entity_type');
        $setup->getConnection()->createTable($table);



//====================EAV_ATTRIBUTE===============================================================
        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_eav_attribute'))
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'attribute_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addColumn(
                'attribute_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'attribute_code'
            )
            ->addColumn(
                'backend_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'backend_type'
            )
            ->addForeignKey(
                $setup->getFkName('a_eav_attribute',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('eav_attribute');
        $setup->getConnection()->createTable($table);



//====================EAV_PLANET(ENTITY)===============================================================
        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_planet_entity'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'entity_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('planet_entity');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_planet_entity_text'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'value_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'attribute_id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'value'
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity_text',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity_text',
                    'entity_id',
                    'a_planet_entity',
                    'entity_id'),
                'entity_id',
                $setup->getTable('a_planet_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity_text',
                    'attribute_id',
                    'a_eav_attribute',
                    'attribute_id'),
                'attribute_id',
                $setup->getTable('a_eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('planet_entity_text');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_planet_entity_decimal'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'value_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'attribute_id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '5,2',
                [],
                'value'
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity_decimal',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity_decimal',
                    'entity_id',
                    'a_planet_entity',
                    'entity_id'),
                'entity_id',
                $setup->getTable('a_planet_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_planet_entity_decimal',
                    'attribute_id',
                    'a_eav_attribute',
                    'attribute_id'),
                'attribute_id',
                $setup->getTable('a_eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('planet_entity_decimal');
        $setup->getConnection()->createTable($table);



//====================EAV_SPACESHIP(ENTITY)===============================================================
        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_spaceship_entity'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'entity_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('spaceship_entity');
        $setup->getConnection()->createTable($table);


        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_spaceship_entity_text'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'value_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'attribute_id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'value'
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity_text',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity_text',
                    'entity_id',
                    'a_spaceship_entity',
                    'entity_id'),
                'entity_id',
                $setup->getTable('a_spaceship_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity_text',
                    'attribute_id',
                    'a_eav_attribute',
                    'attribute_id'),
                'attribute_id',
                $setup->getTable('a_eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('spaceship_entity_text');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('a_spaceship_entity_decimal'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'value_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_type_id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'entity_id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false],
                'attribute_id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '5,2',
                [],
                'value'
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity_decimal',
                    'entity_type_id',
                    'a_eav_entity_type',
                    'entity_type_id'),
                'entity_type_id',
                $setup->getTable('a_eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity_decimal',
                    'entity_id',
                    'a_spaceship_entity',
                    'entity_id'),
                'entity_id',
                $setup->getTable('a_spaceship_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName('a_spaceship_entity_decimal',
                    'attribute_id',
                    'a_eav_attribute',
                    'attribute_id'),
                'attribute_id',
                $setup->getTable('a_eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('spaceship_entity_decimal');
        $setup->getConnection()->createTable($table);


        $setup->endSetup();
    }
}
