<?php

namespace VendorName\ModuleName\Model\ResourceModel;


class Eavplanet extends \Magento\Eav\Model\Entity\AbstractEntity
{
    public function __construct(
        \Magento\Eav\Model\Entity\Context $context,
        $data = []
    )

    {
        parent::__construct($context, $data);
        $this->setType('planet');
        $this->setConnection('planet_read', 'planet_write');
    }
}