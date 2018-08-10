<?php
namespace VendorName\ModuleName\Api\Data;

/**
 * @api
 */
interface GameConsoleInterface
{
    /**#@+
     * Constants
     */
    const GOODS_ID = 'goods_id';

    const NAME = 'name';

    const PRICE = 'price';

    const COUNT = 'count';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * @return int|null
     */
    public function getGoodsId();

    /**
     * @param int $goodsId
     * @return $this
     */
    public function setGoodsId($goodsId);

    /**
     * @return string|null
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return float|null
     */
    public function getPrice();

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice($price);

    /**
     * @return int|null
     */
    public function getCount();

    /**
     * @param int $count
     * @return $this
     */
    public function setCount($count);

    /**
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}
