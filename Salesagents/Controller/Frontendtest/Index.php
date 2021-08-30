<?php

namespace AHT\Salesagents\Controller\Frontendtest;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $_salesagentFactory;
    protected $_collectionFactory;
    protected $_collectionFactoryy;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\Salesagents\Model\SalesagentFactory $salesagentFactory,
        \AHT\Salesagents\Model\ResourceModel\Salesagent\CollectionFactory $collectionFactory,
        \AHT\Salesagents\Model\ResourceModel\Product\Grid\CollectionFactory $collectionFactoryy
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_salesagentFactory = $salesagentFactory;
        $this->_collectionFactory = $collectionFactory;
        $this->_collectionFactoryy = $collectionFactoryy;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->_salesagentFactory->create()->getCollection();
        $data2 = $data->getData();
        $data3 = $this->_collectionFactory->create();
        $data4 = $data3->getData();
        $data5 = $this->_collectionFactoryy->create();
        $data6 = $data5->getData();
        $a = 1;
        // die;



        return $this->_pageFactory->create();
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AHT_Salesagents::test');
    }
}
