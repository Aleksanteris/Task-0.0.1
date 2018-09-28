<?php
namespace VendorName\ModuleName\Controller\Repository;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use VendorName\ModuleName\Model\GameConsoleFactory;
use VendorName\ModuleName\Model\ResourceModel\GameConsole\CollectionFactory;
use VendorName\ModuleName\Model\ResourceModel\GameConsole as GameConsoleResource;
use VendorName\ModuleName\Api\GameConsoleRepositoryInterface as Repository;

/*use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\FilterFactory;
use Magento\Framework\Api\Search\FilterGroupFactory;*/

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;

class GetList extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var GameConsoleFactory
     */
    protected $_gameConsoleFactory;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var GameConsoleResource
     */
    protected $_gameConsoleResource;


    /**
     * @var Repository
     */
    protected $_repository;

    /**
     * @var SearchCriteriaInterface
     */
    protected $_searchCriteria;

    /**
     * @var FilterBuilder
     */
    protected $_filterBuilder;

    /**
     * @var FilterGroupBuilder
     */
    protected $_filterGroupBuilder;

    /**
     * ShowFlatCollection constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param GameConsoleFactory $gameConsoleFactory
     * @param CollectionFactory $collectionFactory
     * @param GameConsoleResource $gameConsoleResource
     * @param Repository $repository
     * @param SearchCriteriaInterface $searchCriteria
     * @param FilterBuilder $filterBuilder
     * @param FilterGroupBuilder $filterGroupBuilder
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        GameConsoleFactory $gameConsoleFactory,
        CollectionFactory $collectionFactory,
        GameConsoleResource $gameConsoleResource,
        Repository $repository,
        SearchCriteriaInterface $searchCriteria,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder


    ){
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_gameConsoleFactory = $gameConsoleFactory;
        $this->_collectionFactory = $collectionFactory;
        $this->_gameConsoleResource = $gameConsoleResource;
        $this->_repository = $repository;
        $this->_searchCriteria = $searchCriteria;
        $this->_filterBuilder = $filterBuilder;
        $this->_filterGroupBuilder = $filterGroupBuilder;

    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('ShowFlatCollection'));

        /** @var \VendorName\ModuleName\Model\GameConsole $goods */
        $goods = $this->_gameConsoleFactory->create();

        //it work
        /*      $goods->setName('Test');
                $goods->setPrice(111.44);
                $goods->setCount(12);
                $this->_gameConsoleResource->save($goods);*/


        $collection = $this->_collectionFactory->create();

//        echo $collection->getPageSize();


//        var_dump($collection->toArray());



        /** @var \VendorName\ModuleName\Model\GameConsole $goods1 */
//        $goods1 = $this->_gameConsoleFactory->create();


//        $this->_gameConsoleResource->load($goods1, 10);


        /*     $this->_gameConsoleResource->delete($goods1);*/


        var_dump($this->_repository->getById(8)->toArray());




/*        $filter = $this->_filterBuilder
            ->setField('name')
            ->setValue('Play Station')
            ->setConditionType('like')
            ->create();

        $filter2 = $this->_filterBuilder
            ->setField('goods_id')
            ->setValue('5')
            ->setConditionType('like')
            ->create();

        $filter3 = $this->_filterBuilder
            ->setField('name')
            ->setValue('Play St%')
            ->setConditionType('like')
            ->create();

        $filter_group = $this->_filterGroupBuilder
            ->setFilters([$filter, $filter2])
            ->create();


        $filter_group2 = $this->_filterGroupBuilder
            ->setFilters([$filter3])
            ->create();

        $search_criteria = $this->_searchCriteria
            ->setFilterGroups([$filter_group, $filter_group2]);

        $res = $res = $this->_repository->getList($search_criteria);
        var_dump($res->getItems());*/




        exit();

        return $resultPage;
    }
}
