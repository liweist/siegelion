<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="`order`")
 */
class Order
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $orderid;

    /**
     * @Column(type="string")
     */
    public $orderuid;

    /**
     * @Column(type="string")
     */
    public $ordernumber;

    /**
     * @Column(type="integer")
     */
    public $cartid;

    /**
     * @Column(type="integer")
     */
    public $addressid;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

    /**
     * @Column(type="datetime")
     */
    public $paidat;

    /**
     * @Column(type="integer")
     */
    public $state;

    /**
     * @Column(type="integer")
     */
    public $discount;

    /**
     * @Column(type="integer")
     */
    public $logisticfee;

    /**
     * @Column(type="integer")
     */
    public $totalprice;

    /**
     * @Column(type="string")
     */
    public $title;

    /**
     * @Column(type="text")
     */
    public $description;

    /**
     * Get orderid
     *
     * @return integer
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set orderuid
     *
     * @param string $orderuid
     *
     * @return Order
     */
    public function setOrderuid($orderuid)
    {
        $this->orderuid = $orderuid;

        return $this;
    }

    /**
     * Get orderuid
     *
     * @return string
     */
    public function getOrderuid()
    {
        return $this->orderuid;
    }

    /**
     * Set ordernumber
     *
     * @param string $ordernumber
     *
     * @return Order
     */
    public function setOrdernumber($ordernumber)
    {
        $this->ordernumber = $ordernumber;

        return $this;
    }

    /**
     * Get ordernumber
     *
     * @return string
     */
    public function getOrdernumber()
    {
        return $this->ordernumber;
    }

    /**
     * Set cartid
     *
     * @param integer $cartid
     *
     * @return Order
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
     * Set addressid
     *
     * @param integer $addressid
     *
     * @return Order
     */
    public function setAddressid($addressid)
    {
        $this->addressid = $addressid;

        return $this;
    }

    /**
     * Get addressid
     *
     * @return integer
     */
    public function getAddressid()
    {
        return $this->addressid;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Order
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
     * Set paidat
     *
     * @param \DateTime $paidat
     *
     * @return Order
     */
    public function setPaidat($paidat)
    {
        $this->paidat = $paidat;

        return $this;
    }

    /**
     * Get paidat
     *
     * @return \DateTime
     */
    public function getPaidat()
    {
        return $this->paidat;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Order
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     *
     * @return Order
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return integer
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set logisticfee
     *
     * @param integer $logisticfee
     *
     * @return Order
     */
    public function setLogisticfee($logisticfee)
    {
        $this->logisticfee = $logisticfee;

        return $this;
    }

    /**
     * Get logisticfee
     *
     * @return integer
     */
    public function getLogisticfee()
    {
        return $this->logisticfee;
    }

    /**
     * Set totalprice
     *
     * @param integer $totalprice
     *
     * @return Order
     */
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;

        return $this;
    }

    /**
     * Get totalprice
     *
     * @return integer
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Order
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $description
     *
     * @return Order
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }
}
