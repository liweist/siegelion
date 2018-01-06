<?php
namespace Siegelion\Service\Business;

use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Storage\Persistence\Entity\Customer;
use Siegelion\Storage\Persistence\Entity\Cart;
use Siegelion\Storage\Persistence\Entity\Order;
use Siegelion\Storage\Persistence\Entity\Address;
use Siegelion\Storage\Persistence\DataManagerAbstract;
use Overtrue\Socialite\User;
use Doctrine\ORM\NoResultException;

class CustomerManager extends DataManagerAbstract
{
    private $oCustomer;

    public function __construct($iCustomerid = null)
    {
        $this->init();
        if (!is_null($iCustomerid)) {
            $this->oCustomer = $this->manage(Customer::class, $iCustomerid);
        }
    }

    public function createByWx(User $oWxUser)
    {
        $this->oCustomer = new Customer();
        $this->oCustomer->setWxid($oWxUser->getId())
                        ->setWxname($oWxUser->getName())
                        ->setAvatarurl($oWxUser->getAvatar())
                        ->setGender($oWxUser->getOriginal()['sex'])
                        ->setCity($oWxUser->getOriginal()['city'])
                        ->setProvince($oWxUser->getOriginal()['province'])
                        ->setCountry($oWxUser->getOriginal()['country'])
                        ->setCreatedat(new \DateTime());
        $this->oDataManager->persist($this->oCustomer);
        $this->commit();

        return $this->oCustomer;
    }

    public function has()
    {
        if (is_null($this->oCustomer)) {
            return false;
        }
        return true;
    }

    public function get()
    {
        return $this->oCustomer;
    }

    public function hasByWxid($sWxid)
    {
        if (is_null($this->getByWxid($sWxid))) {
            return false;
        }
        return true;
    }

    public function getByWxid($sWxid)
    {
        $this->oCustomer = $this->oDataManager
                                ->getRepository(Customer::class)
                                ->findOneByWxid($sWxid);
        return $this->oCustomer;
    }

    public function personalAuthority($sName, $sPersonalid)
    {
        $this->oCustomer = $this->manage(Customer::class, $this->oCustomer->getCustomerid());
        $this->oCustomer->setName($sName);
        $this->oCustomer->setPersonalid($sPersonalid);
        $this->commit();

        return $this;
    }

    public function hasCart()
    {
        try {
            $this->getCart();
            return true;
        } catch (NoResultException $e) {
            return false;
        }
    }

    public function getCart()
    {
        $sSelect = 'c';
        $sFrom = Cart::class.' c';
        $sWhere = 'c.customerid=?1 AND c.checkoutat IS NULL';
        return $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                  ->setParameter(1, $this->oCustomer->getCustomerid())
                                  ->getSingleResult();
    }

    public function addAddress($aLocation, $sName, $sTel)
    {
        $oAddress = new Address();
        $oAddress->setCustomerid($this->oCustomer->getCustomerid())
                 ->setCountry($aLocation['country'])
                 ->setProvince($aLocation['province'])
                 ->setCity($aLocation['city'])
                 ->setArea($aLocation['area'])
                 ->setDetail($aLocation['detail'])
                 ->setName($sName)
                 ->setTel($sTel)
                 ->setDefaultat(new \DateTime())
                 ->setEnable(1);
        $this->oDataManager->persist($oAddress);
        $this->commit();

        $this->setUsingAddress($oAddress->getAddressid());
        return $oAddress;
    }

    public function removeAddress($iAddressid)
    {
        $oAddress = $this->oDataManager->find(Address::class, $iAddressid);
        $oAddress->setEnable(0);
        $this->commit();
        return true;
    }

    public function hasAddress()
    {
        $oAddress = $this->oDataManager
                         ->getRepository(Address::class)
                         ->findOneByCustomerid($this->oCustomer->getCustomerid());
        if (is_null($oAddress)) {
            return false;
        }
        return true;
    }

    public function setDefaultAddress($iAddressid)
    {
        $oAddress = $this->oDataManager->find(Address::class, $iAddressid);
        $oAddress->setDefaultat(new \DateTime());
        $this->commit();
        return true;
    }

    public function getDefaultAddress()
    {
        $oAddress = $this->oDataManager
                         ->getRepository(Address::class)
                         ->findOneByCustomerid($this->oCustomer->getCustomerid(), ['defaultat' => 'desc']);
        $oSession = new Session('address');
        $oSession->set('obj', $oAddress);
        return $oAddress;
    }

    public function getAddress($iAddressid)
    {
        return $this->oDataManager->find(Address::class, $iAddressid);
    }

    public function setAddress($iAddressid, $aLocation, $sName, $sTel)
    {
        $oAddress = $this->oDataManager->find(Address::class, $iAddressid);
        $oAddress->setCountry($aLocation['country'])
                 ->setProvince($aLocation['province'])
                 ->setCity($aLocation['city'])
                 ->setArea($aLocation['area'])
                 ->setDetail($aLocation['detail'])
                 ->setName($sName)
                 ->setTel($sTel);
        $this->commit();
        return true;
    }

    public function getAddresses()
    {
        return $this->oDataManager
                    ->getRepository(Address::class)
                    ->findByCustomerid($this->oCustomer->getCustomerid(), ['defaultat' => 'desc']);
    }

    public function hasUsingAddress()
    {
        $oSession = new Session('address');
        if ($oSession->has('obj')) {
            return true;
        }
        return false;
    }

    public function setUsingAddress($iAddressid) {
        $oAddress = $this->getAddress($iAddressid);
        $oSession = new Session('address');
        $oSession->set('obj', $oAddress);
        return $oAddress;
    }

    public function getUsingAddress() {
        $oSession = new Session('address');
        return $oSession->get('obj');
    }

    public function getOpenOrders()
    {
        $sSelect = 'o';
        $sFrom = Customer::class.' c, '.Cart::class.' ct, '.Order::class.' o';
        $sWhere = 'c.customerid=ct.customerid AND ct.cartid=o.cartid AND ct.checkoutat IS NOT NULL AND o.paidat IS NULL AND c.customerid=?1';
        return $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                  ->setParameter(1, $this->oCustomer->getCustomerid())
                                  ->getResult();
    }

    public function getPaidOrders()
    {
        $sSelect = 'o';
        $sFrom = Customer::class.' c, '.Cart::class.' ct, '.Order::class.' o';
        $sWhere = 'c.customerid=ct.customerid AND ct.cartid=o.cartid AND ct.checkoutat IS NOT NULL AND o.paidat IS NOT NULL AND c.customerid=?1';
        return $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                  ->setParameter(1, $this->oCustomer->getCustomerid())
                                  ->getResult();
    }

    public function getClosedOrders()
    {
        $sSelect = 'o';
        $sFrom = Customer::class.' c, '.Cart::class.' ct, '.Order::class.' o';
        $sWhere = 'c.customerid=ct.customerid AND ct.cartid=o.cartid AND ct.checkoutat IS NOT NULL AND o.paidat IS NOT NULL AND o.state=1 AND c.customerid=?1';
        return $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                  ->setParameter(1, $this->oCustomer->getCustomerid())
                                  ->getResult();
    }

    public function toSession()
    {
        $oSession = new Session('customer');
        $oSession->set('obj', $this->oCustomer);
    }

    public function fromSession()
    {
        $oSession = new Session('customer');
        $this->oCustomer = $oSession->get('obj');
        return $this->oCustomer;
    }

    public function hasSession()
    {
        $oSession = new Session('customer');
        if ($oSession->has('obj')) {
            $this->oCustomer = $oSession->get('obj');
            return true;
        }
        return false;
    }
}