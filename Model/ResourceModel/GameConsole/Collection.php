<?php
namespace VendorName\ModuleName\Model\ResourceModel\GameConsole;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use VendorName\ModuleName\Model\GameConsole;
use VendorName\ModuleName\Model\ResourceModel\GameConsole as GameConsoleResource;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GameConsole::class, GameConsoleResource::class);
    }
}
