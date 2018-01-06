<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="cartitem")
 */
class Cartitem
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $cartitemid;

    /**
     * @Column(type="integer")
     */
    public $cartid;

    /**
     * @Column(type="integer")
     */
    public $productid;

    /**
     * @Column(type="integer")
     */
    public $sku;

    /**
     * @Column(type="integer")
     */
    public $quantity;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

    /**
     * @Column(type="integer")
     */
    public $enable;

    /**
     * Get cartitemid
     *
     * @return integer
     */
    public function getCartitemid()
    {
        return $this->cartitemid;
    }

    /**
     * Set cartid
     *
     * @param integer $cartid
     *
     * @return Cart
     */
    public function setCartid($cartid)
    {
        $this->cartid = $cartid;

        return $this;
    }

    /**
     * Get cartid
     *
     * @return integer
     */
    public function getCartid()
    {
        return $this->cartid;
    }

    /**
     * Set productid
     *
     * @param integer $productid
     *
     * @return Cart
     */
    public function setProductid($productid)
    {
        $this->productid = $productid;

        return $this;
    }

    /**
     * Get productid
     *
     * @return integer
     */
    public function getProductid()
    {
        return $this->productid;
    }

    /**
     * Set sku
     *
     * @param integer $sku
     *
     * @return Cart
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return integer
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Cart
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Cart
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set enable
     *
     * @param integer $enable
     *
     * @return Cart
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get enable
     *
     * @return integer
     */
    public function getEnable()
    {
        return $this->enable;
    }
}
