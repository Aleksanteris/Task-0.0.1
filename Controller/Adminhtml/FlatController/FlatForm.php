<?php
namespace VendorName\ModuleName\Controller\Adminhtml\FlatController;

class FlatForm extends \Magento\Backend\App\Action
{

    protected $_resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();

        return $resultPage;
    }


}