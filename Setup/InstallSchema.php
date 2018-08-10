<?php
namespace VendorName\ModuleName\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use VendorName\ModuleName\Model\Eavplanet as PlanetEntity;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     *
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'a_flat_table'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('a_flat_table'))
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
                'Updated At'
            )
            ->setComment('flat_table');
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'a_planet_entity'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable(PlanetEntity::ENTITY . '_entity'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'entity_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'entity_type_id'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'Name'
            )
            ->addColumn(
                'ordinal_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Ordinal_number'
            )
            ->addForeignKey(
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity',
                    'entity_type_id',
                    'eav_entity_type',
                    'entity_type_id'
                ),
                'entity_type_id',
                $installer->getTable('eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('planet_entity');
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'a_planet_entity_text'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable(PlanetEntity::ENTITY . '_entity_text'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'value_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'entity_type_id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'entity_id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'attribute_id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                [],
                'value'
            )
            ->addForeignKey(
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity_text',
                    'entity_type_id',
                    'eav_entity_type',
                    'entity_type_id'
                ),
                'entity_type_id',
                $installer->getTable('eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity_text',
                    'entity_id',
                    PlanetEntity::ENTITY . '_entity',
                    'entity_id'
                ),
                'entity_id',
                $installer->getTable(PlanetEntity::ENTITY . '_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity_text',
                    'attribute_id',
                    'eav_attribute',
                    'attribute_id'
                ),
                'attribute_id',
                $installer->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('planet_entity_text');
        $installer->getConnection()->createTable($table);

        /**
         * Create table 'a_planet_entity_decimal'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable(PlanetEntity::ENTITY . '_entity_decimal'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'value_id'
            )
            ->addColumn(
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'entity_type_id'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                'entity_id'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true, 'nullable' => false, 'default' => '0'],
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
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity_decimal',
                    'entity_type_id',
                    'eav_entity_type',
                    'entity_type_id'
                ),
                'entity_type_id',
                $installer->getTable('eav_entity_type'),
                'entity_type_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity_decimal',
                    'entity_id',
                    PlanetEntity::ENTITY . '_entity',
                    'entity_id'
                ),
                'entity_id',
                $installer->getTable(PlanetEntity::ENTITY . '_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $installer->getFkName(
                    PlanetEntity::ENTITY . '_entity_decimal',
                    'attribute_id',
                    'eav_attribute',
                    'attribute_id'
                ),
                'attribute_id',
                $installer->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('planet_entity_decimal');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
