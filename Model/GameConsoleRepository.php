<?php
namespace VendorName\ModuleName\Model;

use VendorName\ModuleName\Api\GameConsoleRepositoryInterface;
use VendorName\ModuleName\Model\GameConsoleFactory;
use VendorName\ModuleName\Model\ResourceModel\GameConsole as GameConsoleResource;
use VendorName\ModuleName\Model\ResourceModel\GameConsole\Collection;
use VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory;
use VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterfaceFactory;
use VendorName\ModuleName\Api\Data\GameConsoleInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class GameConsoleRepository implements GameConsoleRepositoryInterface
{
    /**
     * @var \VendorName\ModuleName\Model\GameConsoleFactory;
     */
    private $gameConsoleFactory;

    /**
     * @var \VendorName\ModuleName\Model\ResourceModel\GameConsole
     */
    private $gameConsoleResource;

    /**
     * @var \VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory
     */
    private $gameConsoleCollectionFactory;

    /**
     * @var \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterfaceFactory
     */
    private $gameConsoleSearchResultFactory;

    /**
     * @param \VendorName\ModuleName\Model\GameConsoleFactory $gameConsoleFactory
     * @param \VendorName\ModuleName\Model\ResourceModel\GameConsole $gameConsoleResource
     * @param \VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory $gameConsoleCollectionFactory
     * @param \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterfaceFactory $gameConsoleSearchResultFactory
     */
    public function __construct(
        GameConsoleFactory $gameConsoleFactory,
        GameConsoleResource $gameConsoleResource,
        CollectionFactory $gameConsoleCollectionFactory,
        GameConsoleSearchResultsInterfaceFactory $gameConsoleSearchResultFactory
    ) {
        $this->gameConsoleFactory = $gameConsoleFactory;
        $this->gameConsoleResource = $gameConsoleResource;
        $this->gameConsoleCollectionFactory = $gameConsoleCollectionFactory;
        $this->gameConsoleSearchResultFactory = $gameConsoleSearchResultFactory;
    }

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return \VendorName\ModuleName\Api\Data\GameConsoleInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(GameConsoleInterface $gameConsole)
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
            throw new NoSuchEntityException(__('Game console with id "%1" does not exist.', $goodsId));
        }
        return $goods;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \VendorName\ModuleName\Api\Data\GameConsoleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->gameConsoleSearchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        /** @var \VendorName\ModuleName\Model\ResourceModel\GameConsole\Collection $collection */
        $collection = $this->gameConsoleFactory->create()->getCollection();
        // Add filters from root filter group to the collection
        foreach ($searchCriteria->getFilterGroups() as $group) {
            $this->addFilterGroupToCollection($group, $collection);
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $field = $sortOrder->getField();
                $collection->addOrder(
                    $field,
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());

        $goods = [];
        /** @var \VendorName\ModuleName\Api\Data\GameConsoleInterface $good */
        foreach ($collection->getItems() as $good) {
            $goods[] = $this->getById($good->getGoodsId());
        }
        $searchResults->setItems($goods);

        return $searchResults;
    }

    /**
     * @param \VendorName\ModuleName\Api\Data\GameConsoleInterface $gameConsole
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(GameConsoleInterface $gameConsole)
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

    /**
     * Helper function that adds a FilterGroup to the collection.
     *
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param \VendorName\ModuleName\Model\ResourceModel\GameConsole\Collection $collection
     * @return void
     * @throws \Magento\Framework\Exception\InputException
     */
    protected function addFilterGroupToCollection(FilterGroup $filterGroup, Collection $collection)
    {
        foreach ($filterGroup->getFilters() as $filter) {
            $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
            $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
        }
    }
}
