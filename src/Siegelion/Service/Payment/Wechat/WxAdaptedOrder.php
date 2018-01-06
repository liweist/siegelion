<?php
namespace Siegelion\Service\Payment\Wechat;

use Siegelion\Storage\Persistence\DataManager;
use Siegelion\Storage\Persistence\Entity\Order;
use Siegelion\Storage\Persistence\Entity\Cart;
use Siegelion\Storage\Persistence\Entity\Customer;

class WxAdaptedOrder
{
    private $oOrder;
    private $sWxid;

    public function __construct(Order $oOrder)
    {
        $this->oOrder = $oOrder;

        $sSelect = 'c.wxid AS customerwxid';
        $sFrom = Customer::class.' c, '.Cart::class.' ct';
        $sWhere = 'ct.customerid=c.customerid AND ct.cartid=?1';
        $oDataManager = DataManager::bind();
        $this->sWxid = $oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                   ->setParameter(1, $oOrder->getCartid())
                                   ->getSingleScalarResult();
    }

    public function getTitle()
    {
        return $this->oOrder->getTitle();
    }

    public function getDescription()
    {
        return $this->oOrder->getDescription();
    }

    public function getOrderuid()
    {
        return $this->oOrder->getOrderuid();
    }

    public function getWxid()
    {
        return $this->sWxid;
    }

    public function getPayprice()
    {
        return $this->oOrder->getTotalprice() + $this->oOrder->getLogisticfee() - $this->oOrder->getDiscount();
    }
}