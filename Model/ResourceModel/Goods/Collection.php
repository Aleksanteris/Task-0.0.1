<?php
namespace VendorName\ModuleName\Model\ResourceModel\Goods;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init( 'VendorName\ModuleName\Model\Goods', 'VendorName\ModuleName\Model\ResourceModel\Goods');
    }
}
