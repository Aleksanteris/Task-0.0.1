<?php
namespace VendorName\ModuleName\Model\ResourceModel\Eavplanet;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init( 'VendorName\ModuleName\Model\Eavplanet', 'VendorName\ModuleName\Model\ResourceModel\Eavplanet');
    }
}