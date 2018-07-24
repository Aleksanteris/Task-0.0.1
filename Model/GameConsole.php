<?php
namespace VendorName\ModuleName\Model;

use Magento\Framework\Model\AbstractModel;
use VendorName\ModuleName\Api\Data\GameConsoleInterface;
use VendorName\ModuleName\Model\ResourceModel\GameConsole as GameConsoleResource;

class GameConsole extends AbstractModel implements GameConsoleInterface
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GameConsoleResource::class);

    }

    /**
     * @return int|null
     */
    public function getGoodsId()
    {
        return $this->getData(self::GOODS_ID);
    }

    /**
     * @param int $goodsId
     * @return $this
     */
    public function setGoodsId($goodsId)
    {
        return $this->setData(self::GOODS_ID, $goodsId);
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return float|null
     */
    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @return int|null
     */
    public function getCount()
    {
        return $this->getData(self::COUNT);
    }

    /**
     * @param int $count
     * @return $this
     */
    public function setCount($count)
    {
        return $this->setData(self::COUNT, $count);
    }

    /**
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
