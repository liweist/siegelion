<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="store")
 */
class Store
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $storeid;

    /**
     * @Column(type="integer")
     */
    public $productid;

    /**
     * @Column(type="integer")
     */
    public $quantity;

    /**
     * @Column(type="string")
     */
    public $location;

    /**
     * Get storeid
     *
     * @return integer
     */
    public function getStoreid()
    {
        return $this->storeid;
    }

    /**
     * Set productid
     *
     * @param integer $productid
     *
     * @return Store
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Store
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
     * Set location
     *
     * @param string $location
     *
     * @return Store
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
}
