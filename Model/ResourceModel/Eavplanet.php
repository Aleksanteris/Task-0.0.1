<?php
namespace VendorName\ModuleName\Model\ResourceModel;

use Magento\Eav\Model\Entity\AbstractEntity;
use VendorName\ModuleName\Model\Eavplanet as PlanetEntity;

class Eavplanet extends AbstractEntity
{
    protected function _construct()
    {
        $this->_read = PlanetEntity::ENTITY . '_read';
        $this->_write = PlanetEntity::ENTITY . '_write';
    }

    /**
     * @return \Magento\Eav\Model\Entity\Type
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getEntityType()
    {
        if (empty($this->_type)) {
            $this->setType(PlanetEntity::ENTITY);
        }
        return parent::getEntityType();
    }
}
