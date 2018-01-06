<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="address")
 */
class Address
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $addressid;

    /**
     * @Column(type="integer")
     */
    public $customerid;

    /**
     * @Column(type="string")
     */
    public $country;

    /**
     * @Column(type="string")
     */
    public $province;

    /**
     * @Column(type="string")
     */
    public $city;

    /**
     * @Column(type="string")
     */
    public $area;

    /**
     * @Column(type="string")
     */
    public $name;

    /**
     * @Column(type="string")
     */
    public $detail;

    /**
     * @Column(type="string")
     */
    public $tel;

    /**
     * @Column(type="datetime")
     */
    public $defaultat;

    /**
     * @Column(type="integer")
     */
    public $enable;

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
     * Set customerid
     *
     * @param integer $customerid
     *
     * @return Address
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
     * Set country
     *
     * @param string $country
     *
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Address
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set area
     *
     * @param string $area
     *
     * @return Address
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Address
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set detail
     *
     * @param string $detail
     *
     * @return Address
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Address
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set defaultat
     *
     * @param datetime $defaultat
     *
     * @return Address
     */
    public function setDefaultat($defaultat)
    {
        $this->defaultat = $defaultat;

        return $this;
    }

    /**
     * Get defaultat
     *
     * @return datetime
     */
    public function getDefaultat()
    {
        return $this->defaultat;
    }

    /**
     * Set enable
     *
     * @param integer $enable
     *
     * @return Address
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
