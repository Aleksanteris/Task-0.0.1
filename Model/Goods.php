<?php
namespace VendorName\ModuleName\Model;

class Goods extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('VendorName\ModuleName\Model\ResourceModel\Goods');
    }
}