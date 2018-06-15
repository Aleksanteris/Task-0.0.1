<?php
namespace VendorName\ModuleName\Controller\Adminhtml\ControllerFolder;

class ShowFlatCollection extends \Magento\Backend\App\Action
{

    protected $_resultPageFactory;

    protected $_goodsFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \VendorName\ModuleName\Model\GoodsFactory $goodsFactory)


    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_goodsFactory = $goodsFactory;
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('ShowFlatCollection'));

        $goods = $this->_goodsFactory->create();
        $collection = $goods->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();

        return $resultPage;
    }
}