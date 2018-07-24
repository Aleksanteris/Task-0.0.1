<?php
namespace VendorName\ModuleName\Api;

use VendorName\ModuleName\Api\Data\GameConsoleInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * @api
 */
interface GameConsoleRepositoryInterface
{
    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(GameConsoleInterface $gameConsole);

    /**
     * @param int $goodsId
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($goodsId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(GameConsoleInterface $gameConsole);

    /**
     * @param int $goodsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($goodsId);
}
