<?php
namespace VendorName\ModuleName\Controller\Adminhtml\ControllerFolder;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use VendorName\ModuleName\Model\GameConsoleFactory;

class ShowFlatCollection extends Action
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
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param GameConsoleFactory $gameConsoleFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        GameConsoleFactory $gameConsoleFactory
    ){
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_gameConsoleFactory = $gameConsoleFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('ShowFlatCollection'));

        /** @var \VendorName\ModuleName\Model\GameConsole $goods */
        $goods = $this->_gameConsoleFactory->create();

        /** @var \VendorName\ModuleName\Model\ResourceModel\GameConsole\Collection $collection */
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
