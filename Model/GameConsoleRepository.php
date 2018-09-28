<?php
namespace VendorName\ModuleName\Model;

use VendorName\ModuleName\Api\GameConsoleRepositoryInterface;
use VendorName\ModuleName\Model\ResourceModel\GameConsole as GameConsoleResource;
use VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory;
use VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class GameConsoleRepository implements GameConsoleRepositoryInterface
{
    /**
     * @var \VendorName\ModuleName\Model\GameConsoleFactory;
     */
    protected $gameConsoleFactory;

    /**
     * @var \VendorName\ModuleName\Model\ResourceModel\GameConsole
     */
    protected $gameConsoleResource;

    /**
     * @var \VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory
     */
    protected $gameConsoleCollectionFactory;

    /**
     * @var \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterfaceFactory
     */
    protected $gameConsoleSearchResultFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param \VendorName\ModuleName\Model\GameConsoleFactory $gameConsoleFactory
     * @param \VendorName\ModuleName\Model\ResourceModel\GameConsole $gameConsoleResource
     * @param \VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory $gameConsoleCollectionFactory
     * @param \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterfaceFactory $gameConsoleSearchResultFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        GameConsoleFactory $gameConsoleFactory,
        GameConsoleResource $gameConsoleResource,
        CollectionFactory $gameConsoleCollectionFactory,
        GameConsoleSearchResultsInterfaceFactory $gameConsoleSearchResultFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->gameConsoleFactory = $gameConsoleFactory;
        $this->gameConsoleResource = $gameConsoleResource;
        $this->gameConsoleCollectionFactory = $gameConsoleCollectionFactory;
        $this->gameConsoleSearchResultFactory = $gameConsoleSearchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole)
    {
        try {
            $this->gameConsoleResource->save($gameConsole);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $gameConsole;
    }

    /**
     * @param int $goodsId
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($goodsId)
    {
        $goods = $this->gameConsoleFactory->create();
        $this->gameConsoleResource->load($goods, $goodsId);
        if (!$goods->getGoodsId()) {
            throw new NoSuchEntityException(__('Game console with id "%1" does not exist!', $goodsId));
        }
        return $goods;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var \VendorName\ModuleName\Model\ResourceModel\GameConsole\Collection $collection */
        $collection = $this->gameConsoleCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterface $searchResults */
        $searchResults = $this->gameConsoleSearchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole)
    {
        try {
            $this->gameConsoleResource->delete($gameConsole);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param int $goodsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($goodsId)
    {
        return $this->delete($this->getById($goodsId));
    }
}
