<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="transaction")
 */
class Transaction
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $transactionid;

    /**
     * @Column(type="integer")
     */
    public $orderid;

    /**
     * @Column(type="string")
     */
    public $gateway;

    /**
     * @Column(type="string")
     */
    public $gatewaytransactionid;

    /**
     * @Column(type="string")
     */
    public $currency;

    /**
     * @Column(type="integer")
     */
    public $totalprice;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

    /**
     * @Column(type="string")
     */
    public $bank;

    /**
     * @Column(type="string")
     */
    public $client;

    /**
     * @Column(type="string")
     */
    public $sign;

    /**
     * Get transactionid
     *
     * @return integer
     */
    public function getTransactionid()
    {
        return $this->transactionid;
    }

    /**
     * Set orderid
     *
     * @param integer $orderid
     *
     * @return Transaction
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

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
     * Set gateway
     *
     * @param string $gateway
     *
     * @return Transaction
     */
    public function setGateway($gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * Get gateway
     *
     * @return string
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * Set gatewaytransactionid
     *
     * @param string $gatewaytransactionid
     *
     * @return Transaction
     */
    public function setGatewaytransactionid($gatewaytransactionid)
    {
        $this->gatewaytransactionid = $gatewaytransactionid;

        return $this;
    }

    /**
     * Get gatewaytransactionid
     *
     * @return string
     */
    public function getGatewaytransactionid()
    {
        return $this->gatewaytransactionid;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Transaction
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set totalprice
     *
     * @param integer $totalprice
     *
     * @return Transaction
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
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Transaction
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
     * Set bank
     *
     * @param string $bank
     *
     * @return Transaction
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set client
     *
     * @param string $client
     *
     * @return Transaction
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set sign
     *
     * @param string $sign
     *
     * @return Transaction
     */
    public function setSign($sign)
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Get sign
     *
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }
}