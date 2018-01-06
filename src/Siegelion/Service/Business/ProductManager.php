<?php
namespace Siegelion\Service\Business;

use Siegelion\Storage\Persistence\DataManagerAbstract;
use Siegelion\Storage\Persistence\Entity\Product;

class ProductManager extends DataManagerAbstract
{
    private $oProduct;

    public function __construct($iProductid = null)
    {
        $this->init();
        if (!is_null($iProductid)) {
            $this->oProduct = $this->manage(Product::class, $iProductid);
        }
    }

    public function create($sName, $sDescription, $sUnit, $iSellprice, $iImportprice, $iProducttypeid, $aKeywords)
    {
        $this->oProduct = new Product();
        $this->oProduct->setName($sName)
                       ->setDescription($sDescription)
                       ->setUnit($sUnit)
                       ->setSellprice($iSellprice)
                       ->setImportprice($iImportprice)
                       ->setProducttypeid($iProducttypeid)
                       ->setKeywords($aKeywords)
                       ->setCreatedat(new \DateTime())
                       ->setEnable(1);
        $this->oDataManager->persist($this->oProduct);
        $this->commit();

        return $this->oProduct;
    }

    public function setPicurl($aPictures)
    {
        $this->oProduct->setPicurl($aPictures);
        $this->commit();

        return $this;
    }

    public function setBarcode($sBarcode)
    {
        $this->oProduct->setBarcode($sBarcode);
        $this->commit();

        return $this;
    }

    public function referFrom($iProductid)
    {
        $this->oProduct->setReferenceid($iProductid);
        $this->commit();

        return $this;
    }

    public function enable()
    {
        $this->oProduct->setEnable(1);
        $this->commit();

        return $this;
    }

    public function disable()
    {
        $this->oProduct->setEnable(0);
        $this->commit();

        return $this;
    }

    public function has()
    {
        if (is_null($this->oProduct)) {
            return false;
        }
        return true;
    }
    
    public function get()
    {
        return $this->oProduct;
    }

    public function getAll()
    {
        return $this->oDataManager->getRepository(Product::class)->findAll();
    }
}