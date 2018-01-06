<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="product")
 */
class Product
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $productid;

    /**
     * @Column(type="string")
     */
    public $name;

    /**
     * @Column(type="string")
     */
    public $barcode;

    /**
     * @Column(type="integer")
     */
    public $sellprice;

    /**
     * @Column(type="integer")
     */
    public $importprice;

    /**
     * @Column(type="json_array")
     */
    public $picurl;

    /**
     * @Column(type="string")
     */
    public $unit;

    /**
     * @Column(type="integer")
     */
    public $referenceid;

    /**
     * @Column(type="datetime")
     */
    public $createdat;

    /**
     * @Column(type="integer")
     */
    public $producttypeid;

    /**
     * @Column(type="text")
     */
    public $description;

    /**
     * @Column(type="json_array")
     */
    public $keywords;

    /**
     * @Column(type="json_array")
     */
    public $skus;

    /**
     * @Column(type="integer")
     */
    public $weight;

    /**
     * @Column(type="integer")
     */
    public $customs;

    /**
     * @Column(type="integer")
     */
    public $enable;

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
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Set barcode
     *
     * @param string $barcode
     *
     * @return Product
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set sellprice
     *
     * @param integer $sellprice
     *
     * @return Product
     */
    public function setSellprice($sellprice)
    {
        $this->sellprice = $sellprice;

        return $this;
    }

    /**
     * Get sellprice
     *
     * @return integer
     */
    public function getSellprice()
    {
        return $this->sellprice;
    }

    /**
     * Set importprice
     *
     * @param integer $importprice
     *
     * @return Product
     */
    public function setImportprice($importprice)
    {
        $this->importprice = $importprice;

        return $this;
    }

    /**
     * Get importprice
     *
     * @return integer
     */
    public function getImportprice()
    {
        return $this->importprice;
    }

    /**
     * Set picurl
     *
     * @param array $picurl
     *
     * @return Product
     */
    public function setPicurl(array $picurl)
    {
        $this->picurl = $picurl;

        return $this;
    }

    /**
     * Get picurl
     *
     * @return array
     */
    public function getPicurl()
    {
        return $this->picurl;
    }

    /**
     * Set unit
     *
     * @param string $unit
     *
     * @return Product
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set referenceid
     *
     * @param integer $referenceid
     *
     * @return Product
     */
    public function setReferenceid($referenceid)
    {
        $this->referenceid = $referenceid;

        return $this;
    }

    /**
     * Get referenceid
     *
     * @return integer
     */
    public function getReferenceid()
    {
        return $this->referenceid;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Product
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
     * Set producttypeid
     *
     * @param integer $producttypeid
     *
     * @return Product
     */
    public function setProducttypeid($producttypeid)
    {
        $this->producttypeid = $producttypeid;

        return $this;
    }

    /**
     * Get producttypeid
     *
     * @return integer
     */
    public function getProducttypeid()
    {
        return $this->producttypeid;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set keywords
     *
     * @param array $keywords
     *
     * @return Product
     */
    public function setKeywords(array $keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set skus
     *
     * @param array $skus
     *
     * @return Product
     */
    public function setSkus(array $skus)
    {
        $this->skus = $skus;

        return $this;
    }

    /**
     * Get skus
     *
     * @return array
     */
    public function getSkus()
    {
        return $this->skus;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set customs
     *
     * @param integer $customs
     *
     * @return Product
     */
    public function setCustoms($customs)
    {
        $this->customs = $customs;

        return $this;
    }

    /**
     * Get customs
     *
     * @return integer
     */
    public function getCustoms()
    {
        return $this->customs;
    }

    /**
     * Set enable
     *
     * @param integer $enable
     *
     * @return Product
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
