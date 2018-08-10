<?php
namespace VendorName\ModuleName\Setup;

use Magento\Eav\Setup\EavSetup;
use VendorName\ModuleName\Model\Eavplanet as PlanetEntity;
use VendorName\ModuleName\Model\ResourceModel\Eavplanet as EavplanetResource;

class EavplanetSetup extends EavSetup
{
    public function getDefaultEntities()
    {
        $entities = [
            PlanetEntity::ENTITY => [
                'entity_model' => EavplanetResource::class,
                'table' => PlanetEntity::ENTITY . '_entity',
                'attributes' => [
                    'name' => [
                        'type' => 'static',
                    ],
                    'ordinal_number' => [
                        'type' => 'static',
                    ],

                    'note' => [
                        'type' => 'text',
                    ],
                    'min_temperature' => [
                        'type' => 'decimal',
                    ],
                ],
            ],
        ];
        return $entities;
    }
}
