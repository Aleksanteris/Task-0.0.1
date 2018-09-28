<?php
namespace VendorName\ModuleName\Controller\Adminhtml\EavController;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use VendorName\ModuleName\Model\EavplanetFactory;
use VendorName\ModuleName\Model\ResourceModel\Eavplanet\CollectionFactory;
use VendorName\ModuleName\Model\ResourceModel\Eavplanet as EavplanetResource;
use Magento\Eav\Model\Config as EavConfig;

class ShowEavCollection extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var EavplanetFactory
     */
    protected $_eavPlanetFactory;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var EavplanetResource
     */
    protected $_eavplanetResource;

    protected $_eavConfig;
    /**
     * ShowEavCollection constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param EavplanetFactory $eavPlanetFactory
     * @param CollectionFactory $collectionFactory
     * @param EavplanetResource $eavplanetResource
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        EavplanetFactory $eavPlanetFactory,
        CollectionFactory $collectionFactory,
        EavplanetResource $eavplanetResource,
        EavConfig $eavConfig
    ){
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_eavPlanetFactory = $eavPlanetFactory;
        $this->_collectionFactory = $collectionFactory;
        $this->_eavplanetResource = $eavplanetResource;
        $this->_eavConfig = $eavConfig;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('ShowEavCollection'));

        /** @var \VendorName\ModuleName\Model\Eavplanet $planet */
        $planet = $this->_eavPlanetFactory->create();

//        $planet->setEntityTypeId($this->_eavplanetResource->getTypeId());

/*        $planet->setName('Test Name');
        $planet->setOrdinalNumber(9);
        $planet->setNote('Test Note.');
        $planet->setMinTemperature(100.11);
        $this->_eavplanetResource->save($planet);*/




        $collection = $this->_collectionFactory->create();

/*        var_dump($collection->getItems());*/

//        var_dump($collection->getItemsByColumnValue('name','Mars'));

        /*var_dump($collection->toArray());*/



        var_dump($collection->addAttributeToSelect('*')->exportToArray());

/*        $collection->addAttributeToFilter('min_temperature', ['eq' => 84.81]);*/

//        foreach($collection as $item){
//            echo "<pre>";
//            print_r($item->getData());
//            echo "</pre>";
//        }




/*      $this->_eavplanetResource->load($planet,3,['min_temperature', 'note']);

        var_dump($planet->getData());*/


/*        $this->_eavplanetResource->load($planet,3);
        $planet->setData('min_temperature', 999.99);
        $this->_eavplanetResource->saveAttribute($planet, 'min_temperature');*/



/*        $this->_eavplanetResource->load($planet,3);
        $this->_eavplanetResource->delete($planet);*/







/*        var_dump($this->_eavConfig->getEntityType(2)->getData());
        echo "<br>";
        var_dump($this->_eavConfig->getAttribute(11, 'note')->getData());*/


        exit();

        return $resultPage;
    }
}
