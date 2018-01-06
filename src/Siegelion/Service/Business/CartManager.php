<?php
namespace Siegelion\Service\Business;

use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Storage\Persistence\DataManagerAbstract;
use Siegelion\Storage\Persistence\Entity\Cart;
use Siegelion\Storage\Persistence\Entity\Cartitem;
use Siegelion\Storage\Persistence\Entity\Product;
use Siegelion\Storage\Persistence\Entity\Customer;
use Siegelion\Service\Logistic\LogisticFee;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\NonUniqueResultException;

class CartManager extends DataManagerAbstract
{
    private $oCart;

    public function __construct($iCartid = null)
    {
        $this->init();
        if (!is_null($iCartid)) {
            $this->oCart = $this->manage(Cart::class, $iCartid);
        }
    }

    public function create(Customer $oCustomer)
    {
        $this->oCart = new Cart();
        $this->oCart->setCustomerid($oCustomer->getCustomerid())
                    ->setCreatedat(new \DateTime());
        $this->oDataManager->persist($this->oCart);
        $this->commit();

        return $this->oCart;
    }

    public function addItem(Product $oProduct, $iQuantity, $iSku)
    {
        $oCartitem = new Cartitem();
        $oCartitem->setProductid($oProduct->getProductid())
                  ->setQuantity($iQuantity)
                  ->setSku($iSku)
                  ->setCartid($this->oCart->getCartid())
                  ->setCreatedat(new \DateTime())
                  ->setEnable(1);
        $this->oDataManager->persist($oCartitem);
        $this->commit();
    }

    public function getItem($iCartitemid)
    {
        return $this->oDataManager->find(Cartitem::class, $iCartitemid);
    }

    public function getItems()
    {
        $sSelect = 'p AS product, ci.cartitemid, ci.quantity, ci.sku';
        $sFrom = Cartitem::class.' ci, '.Product::class.' p, '.Cart::class.' c';
        $sWhere = 'ci.productid=p.productid AND ci.enable=1 AND ci.cartid=?1 AND ci.cartid=c.cartid AND c.checkoutat IS NULL';
        return $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                  ->setParameter(1, $this->oCart->getCartid())
                                  ->getArrayResult();
    }

    public function removeItem($iCartitemid)
    {
        $oCartitem = $this->oDataManager->find(Cartitem::class, $iCartitemid);
        $oCartitem->setEnable(0);
        $this->commit();
        return true;
    }

    public function updateItemQuantity($iCartitemid, $iQuantity)
    {
        $oCartitem = $this->oDataManager->find(Cartitem::class, $iCartitemid);
        $oCartitem->setQuantity($iQuantity);
        $this->commit();
        return true;
    }

    public function getTotalprice()
    {
        $sSelect = 'SUM(p.sellprice * ci.quantity) AS totalprice';
        $sFrom = Cartitem::class.' ci, '.Product::class.' p';
        $sWhere = 'ci.productid=p.productid AND ci.enable=1 AND p.enable=1 AND ci.cartid=?1';
        $iTotalprice = $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                          ->setParameter(1, $this->oCart->getCartid())
                                          ->getSingleScalarResult();
        if (is_null($iTotalprice)) {
            return 0;
        }
        return $iTotalprice;
    }

    public function getItemCount()
    {
        $sSelect = 'COUNT(ci) AS itemCount';
        $sFrom = Cartitem::class.' ci';
        $sWhere = 'ci.enable=1 AND ci.cartid=?1';
        $iItemCount = $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                         ->setParameter(1, $this->oCart->getCartid())
                                         ->getSingleScalarResult();
        if (is_null($iItemCount)) {
            return 0;
        }
        return $iItemCount;
    }

    public function getLogisticFee($sProvince)
    {
        $sSelect = 'SUM(p.weight) AS totalweight';
        $sFrom = Cartitem::class.' ci, '.Product::class.' p';
        $sWhere = 'ci.productid=p.productid AND ci.enable=1 AND p.enable=1 AND ci.cartid=?1';
        $iTotalweight = $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                           ->setParameter(1, $this->oCart->getCartid())
                                           ->getSingleScalarResult();
        $oLogisticFee = new LogisticFee($sProvince);
        return $oLogisticFee->getFee($iTotalweight);
    }

    public function hasCustomsItem()
    {
        try {
            $sSelect = 'ci';
            $sFrom = Cartitem::class.' ci, '.Product::class.' p';
            $sWhere = 'ci.enable=1 AND ci.cartid=?1 AND ci.productid=p.productid AND p.customs=1';
            $oCartitem = $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                            ->setParameter(1, $this->oCart->getCartid())
                                            ->getSingleResult();
            return true;
        } catch(NonUniqueResultException $e) {
            return true;
        } catch(NoResultException $e) {
            return false;
        }
    }

    public function getDiscount()
    {
        //TODO
        return 0;
    }

    public function checkout()
    {
        $this->oCart = $this->manage(Cart::class, $this->oCart->getCartid());
        $this->oCart->setCheckoutat(new \DateTime());
        $this->commit();
        return true;
    }

    public function has()
    {
        if (is_null($this->oCart)) {
            return false;
        }
        return true;
    }

    public function get()
    {
        return $this->oCart;
    }

    public function hasSession()
    {
        $oSession = new Session('cart');
        if ($oSession->has('obj')) {
            $this->oCart = $oSession->get('obj');
            return true;
        }
        return false;
    }

    public function toSession()
    {
        $oSession = new Session('cart');
        $oSession->set('obj', $this->oCart);
    }

    public function fromSession()
    {
        $oSession = new Session('cart');
        return $oSession->get('obj');
    }
}