<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="logistic")
 */
class Logistic
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $logisticid;

    /**
     * @Column(type="integer")
     */
    public $orderid;

    /**
     * @Column(type="string")
     */
    public $company;

    /**
     * @Column(type="string")
     */
    public $companycode;

    /**
     * @Column(type="integer")
     */
    public $type;

    /**
     * @Column(type="string")
     */
    public $status;

    /**
     * @Column(type="integer")
     */
    public $statuscode;

    /**
     * @Column(type="datetime")
     */
    public $statusat;

    /**
     * @Column(type="string")
     */
    public $trackingnumber;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

    /**
     * Get logisticid
     *
     * @return integer
     */
    public function getLogisticid()
    {
        return $this->logisticid;
    }

    /**
     * Set orderid
     *
     * @param integer $orderid
     *
     * @return Logistic
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
     * Set company
     *
     * @param string $company
     *
     * @return Logistic
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set companycode
     *
     * @param string $companycode
     *
     * @return Logistic
     */
    public function setCompanycode($companycode)
    {
        $this->companycode = $companycode;

        return $this;
    }

    /**
     * Get companycode
     *
     * @return string
     */
    public function getCompanycode()
    {
        return $this->companycode;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Logistic
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Logistic
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statuscode
     *
     * @param integer $statuscode
     *
     * @return Logistic
     */
    public function setStatuscode($statuscode)
    {
        $this->statuscode = $statuscode;

        return $this;
    }

    /**
     * Get statuscode
     *
     * @return integer
     */
    public function getStatuscode()
    {
        return $this->statuscode;
    }

    /**
     * Set statusat
     *
     * @param datetime $statusat
     *
     * @return Logistic
     */
    public function setStatusat($statusat)
    {
        $this->statusat = $statusat;

        return $this;
    }

    /**
     * Get statusat
     *
     * @return datetime
     */
    public function getStatusat()
    {
        return $this->statusat;
    }

    /**
     * Set trackingnumber
     *
     * @param string $trackingnumber
     *
     * @return Logistic
     */
    public function setTrackingnumber($trackingnumber)
    {
        $this->trackingnumber = $trackingnumber;

        return $this;
    }

    /**
     * Get trackingnumber
     *
     * @return string
     */
    public function getTrackingnumber()
    {
        return $this->trackingnumber;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Logistic
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
}
