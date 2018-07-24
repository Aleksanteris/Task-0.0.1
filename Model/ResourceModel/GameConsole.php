<?php
namespace VendorName\ModuleName\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class GameConsole extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('a_flat_table','goods_id');
    }
}
