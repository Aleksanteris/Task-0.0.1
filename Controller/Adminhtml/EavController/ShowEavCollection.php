<?php
namespace VendorName\ModuleName\Controller\Adminhtml\EavController;

class ShowEavCollection extends \Magento\Backend\App\Action
{

    protected $_resultPageFactory;

    protected $_eavPlanetFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \VendorName\ModuleName\Model\EavplanetFactory $eavPlanetFactory)


    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_eavPlanetFactory = $eavPlanetFactory;
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('ShowEavCollection'));

        $planet = $this->_eavPlanetFactory->create();
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