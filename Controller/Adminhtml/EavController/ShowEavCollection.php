<?php
namespace VendorName\ModuleName\Controller\Adminhtml\EavController;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use VendorName\ModuleName\Model\EavplanetFactory;

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
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param EavplanetFactory $eavPlanetFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        EavplanetFactory $eavPlanetFactory
    ){
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_eavPlanetFactory = $eavPlanetFactory;
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

        /** @var \VendorName\ModuleName\Model\ResourceModel\Eavplanet\Collection $collection */
        $collection = $planet->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();

        return $resultPage;
    }
}
