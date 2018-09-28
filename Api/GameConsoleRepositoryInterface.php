<?php
namespace VendorName\ModuleName\Api;

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
    public function save(\VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole);

    /**
     * @param int $goodsId
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($goodsId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole);

    /**
     * @param int $goodsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($goodsId);
}
