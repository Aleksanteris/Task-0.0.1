<?php
namespace VendorName\ModuleName\Model\ResourceModel;

use Magento\Eav\Model\Entity\AbstractEntity;
use \Magento\Eav\Model\Entity\Context;

class Eavplanet extends AbstractEntity
{
    /**
     * @param Context $context
     * @param array $data
     * @return void
     */
    public function __construct(Context $context, $data = [])
    {
        parent::__construct($context, $data);
        $this->setType('a_planet');
        $this->setConnection('a_planet', 'a_planet');
    }
}
