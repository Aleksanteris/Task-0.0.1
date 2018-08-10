<?php
namespace VendorName\ModuleName\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface GameConsoleSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface[]
     */
    public function getItems();

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
