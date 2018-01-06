<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="cart")
 */
class Cart
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $cartid;

    /**
     * @Column(type="integer")
     */
    public $customerid;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

    /**
     * @Column(type="datetime")
     */
    public $checkoutat;

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
     * Set customerid
     *
     * @param integer $customerid
     *
     * @return Cart
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer
     */
    public function getCustomerid()
    {
        return $this->customerid;
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
     * Set checkoutat
     *
     * @param \DateTime $checkoutat
     *
     * @return Cart
     */
    public function setCheckoutat($checkoutat)
    {
        $this->checkoutat = $checkoutat;

        return $this;
    }

    /**
     * Get checkoutat
     *
     * @return \DateTime
     */
    public function getCheckoutat()
    {
        return $this->checkoutat;
    }
}
