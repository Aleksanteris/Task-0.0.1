<?php
namespace VendorName\ModuleName\Model\ResourceModel\Eavplanet;

use Magento\Eav\Model\Entity\Collection\AbstractCollection;
use VendorName\ModuleName\Model\Eavplanet;
use VendorName\ModuleName\Model\ResourceModel\Eavplanet as EavplanetResource;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init( Eavplanet::class, EavplanetResource::class);
    }
}
