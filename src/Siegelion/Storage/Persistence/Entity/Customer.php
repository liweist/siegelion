<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="customer")
 */
class Customer
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $customerid;

    /**
     * @Column(type="string")
     */
    public $wxid;

    /**
     * @Column(type="string")
     */
    public $wxname;

    /**
     * @Column(type="string")
     */
    public $name;

    /**
     * @Column(type="string")
     */
    public $personalid;

    /**
     * @Column(type="integer")
     */
    public $memberpoint;

    /**
     * @Column(type="string")
     */
    public $avatarurl;

    /**
     * @Column(type="integer")
     */
    public $gender;

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
    public $country;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

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
     * Set wxid
     *
     * @param string $wxid
     *
     * @return Customer
     */
    public function setWxid($wxid)
    {
        $this->wxid = $wxid;

        return $this;
    }

    /**
     * Get wxid
     *
     * @return string
     */
    public function getWxid()
    {
        return $this->wxid;
    }

    /**
     * Set wxname
     *
     * @param string $wxname
     *
     * @return Customer
     */
    public function setWxname($wxname)
    {
        $this->wxname = $wxname;

        return $this;
    }

    /**
     * Get wxname
     *
     * @return string
     */
    public function getWxname()
    {
        return $this->wxname;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Customer
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
     * Set personalid
     *
     * @param string $personalid
     *
     * @return Customer
     */
    public function setPersonalid($personalid)
    {
        $this->personalid = $personalid;

        return $this;
    }

    /**
     * Get personalid
     *
     * @return string
     */
    public function getPersonalid()
    {
        return $this->personalid;
    }

    /**
     * Set memberpoint
     *
     * @param integer $memberpoint
     *
     * @return Customer
     */
    public function setMemberpoint($memberpoint)
    {
        $this->memberpoint = $memberpoint;

        return $this;
    }

    /**
     * Get memberpoint
     *
     * @return integer
     */
    public function getMemberpoint()
    {
        return $this->memberpoint;
    }

    /**
     * Set avatarurl
     *
     * @param string $avatarurl
     *
     * @return Customer
     */
    public function setAvatarurl($avatarurl)
    {
        $this->avatarurl = $avatarurl;

        return $this;
    }

    /**
     * Get avatarurl
     *
     * @return string
     */
    public function getAvatarurl()
    {
        return $this->avatarurl;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return Customer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Customer
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
     * @return Customer
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
     * Set country
     *
     * @param string $country
     *
     * @return Customer
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
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Customer
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
