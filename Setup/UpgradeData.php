<?php
namespace VendorName\ModuleName\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use VendorName\ModuleName\Model\EavplanetFactory;
use VendorName\ModuleName\Model\ResourceModel\Eavplanet as EavplanetResource;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var EavplanetFactory
     */
    protected $_eavPlanetFactory;

    /**
     * @var EavplanetResource
     */
    protected $_eavplanetResource;

    /**
     * @param EavplanetFactory $eavPlanetFactory
     */
    public function __construct(EavplanetFactory $eavPlanetFactory, EavplanetResource $_eavplanetResource )
    {
        $this->_eavPlanetFactory = $eavPlanetFactory;
        $this->_eavplanetResource = $_eavplanetResource;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavplanet1 = $this->_eavPlanetFactory->create();
//        $eavplanet1->setEntityTypeId($this->_eavplanetResource->getTypeId());
        $eavplanet1->setName('Mars');
        $eavplanet1->setOrdinalNumber(4);
        $eavplanet1->setNote('Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System after Mercury.');
        $eavplanet1->setMinTemperature(153.29);
        $this->_eavplanetResource->save($eavplanet1);

        $eavplanet2 = $this->_eavPlanetFactory->create();
//        $eavplanet2->setEntityTypeId($this->_eavplanetResource->getTypeId());
        $eavplanet2->setName('Mercury');
        $eavplanet2->setOrdinalNumber(1);
        $eavplanet2->setNote('Mercury is the smallest and innermost planet in the Solar System. Its orbital period around the Sun of 87.97 days is the shortest of all the planets in the Solar System.');
        $eavplanet2->setMinTemperature(250.35);
        $this->_eavplanetResource->save($eavplanet2);

        $eavplanet3 = $this->_eavPlanetFactory->create();
//        $eavplanet3->setEntityTypeId($this->_eavplanetResource->getTypeId());
        $eavplanet3->setName('Saturn');
        $eavplanet3->setOrdinalNumber(6);
        $eavplanet3->setNote('Saturn is the sixth planet from the Sun and the second-largest in the Solar System, after Jupiter. It is a gas giant with an average radius about nine times that of Earth.');
        $eavplanet3->setMinTemperature(84.81);
        $this->_eavplanetResource->save($eavplanet3);

        $setup->endSetup();
    }
}
