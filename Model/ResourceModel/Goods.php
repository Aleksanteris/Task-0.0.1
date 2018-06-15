<?php
namespace VendorName\ModuleName\Model\ResourceModel;


class Goods extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('a_flat_table','goods_id');
    }
}