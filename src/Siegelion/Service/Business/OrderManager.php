<?php
namespace Siegelion\Service\Business;

use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Storage\Persistence\DataManagerAbstract;
use Siegelion\Storage\Persistence\Entity\Order;
use Siegelion\Storage\Persistence\Entity\Cart;
use Siegelion\Storage\Persistence\Entity\Cartitem;
use Siegelion\Storage\Persistence\Entity\Transaction;
use Siegelion\Storage\Persistence\Entity\Address;
use Siegelion\Storage\Persistence\Entity\Customer;
use Siegelion\Storage\Persistence\Entity\Product;
use Siegelion\Storage\Persistence\Entity\Logistic;

class OrderManager extends DataManagerAbstract
{
    const OPENED = 0;
    const CLOSED = 1;
    const PAID = 2;
    const PAIDFAIL = 3;
    const REFUND = 4;

    private $oOrder;

    public function __construct($iOrderid = null)
    {
        $this->init();
        if (!is_null($iOrderid)) {
            $this->oOrder = $this->manage(Order::class, $iOrderid);
        }
    }

    public function create(Cart $oCart, Address $oAddress, $iLogisticfee, $iTotalprice, $iDiscount)
    {
        $sOrderuid = md5(uniqid().microtime());
        $this->oOrder = new Order();
        $this->oOrder->setOrderuid($sOrderuid)
                     ->setOrdernumber((new \DateTime())->format('YmdHis').rand(1000, 9999))
                     ->setCartid($oCart->getCartid())
                     ->setAddressid($oAddress->getAddressid())
                     ->setLogisticfee($iLogisticfee)
                     ->setTitle('凑巧COUQIAO-精致海外商品购物')
                     ->setDescription('订单号:'.$sOrderuid)
                     ->setState(self::OPENED)
                     ->setDiscount($iDiscount)
                     ->setTotalprice($iTotalprice)
                     ->setCreatedat(new \DateTime());
        $this->oDataManager->persist($this->oOrder);
        $this->commit();

        return $this->oOrder;
    }

    public function has()
    {
        if (is_null($this->oOrder)) {
            return false;
        }
        return true;
    }

    public function get()
    {
        return $this->oOrder;
    }

    public function getByUid($sUid)
    {
        $this->oOrder = $this->oDataManager
                             ->getRepository(Order::class)
                             ->findOneByOrderuid($sUid);
        return $this->oOrder;
    }

    public function getItems()
    {
        $sSelect = 'p AS product, ci.quantity, ci.sku';
        $sFrom = Cartitem::class.' ci, '.Product::class.' p, '.Cart::class.' c, '.Order::class.' o';
        $sWhere = 'ci.enable=1 AND ci.productid=p.productid AND ci.cartid=c.cartid AND o.orderid=?1 AND o.cartid=c.cartid';
        return $this->oDataManager->createQuery('SELECT '.$sSelect.' FROM '.$sFrom.' WHERE '.$sWhere)
                                  ->setParameter(1, $this->oOrder->getOrderid())
                                  ->getArrayResult();
    }

    public function getAddress()
    {
        return $this->oDataManager->find(Address::class, $this->oOrder->getAddressid());
    }

    public function open()
    {
        $this->oOrder->setState(self::OPENED);
        $this->commit();

        return $this;
    }

    public function close()
    {
        $this->oOrder->setState(self::CLOSED);
        $this->commit();

        return $this;
    }

    public function paid($bPaidState = true)
    {
        if ($bPaidState) {
            $dPaidat = new \DateTime();
            $this->oOrder->setPaidat($dPaidat);
            $this->oOrder->setState(self::PAID);
        } else {
            $this->oOrder->setState(self::PAIDFAIL);
        }
        $this->commit();

        return $this;
    }

    public function refund()
    {
        $this->oOrder->setState(self::REFUND);
        $this->commit();

        return $this;
    }

    public function transact($sGateway, $oPaymentResult)
    {
        $oTransaction = new Transaction();
        switch($sGateway) {
            case 'wxpay':
                $oTransaction->setOrderid($oPaymentResult->out_trade_no)
                             ->setGateway($sGateway)
                             ->setGatewaytransactionid($oPaymentResult->transaction_id)
                             ->setBank($oPaymentResult->bank_type)
                             ->setClient($oPaymentResult->openid)
                             ->setSign($oPaymentResult->sign)
                             ->setCurrency($oPaymentResult->fee_type)
                             ->setTotalprice($oPaymentResult->total_fee)
                             ->setCreatedat(new \DateTime());
                break;
            
            case 'alipay':
                break;
            
            default:
                break;
        }

        $this->oDataManager->persist($oTransaction);
        $this->commit();

        return $this;
    }

    public function getTransaction($iTransactionid = null)
    {
        if (is_null($iTransactionid)) {
            return $this->oDataManager->getRepository(Transaction::class)
                                      ->findBy(['orderid' => $this->oOrder->getOrderid()]);
        }

        return $this->oDataManager->find(Transaction::class, $iTransactionid);
    }

    public function getLogistics()
    {
        return $this->oDataManager->getRepository(Logistic::class)
                                  ->findBy(['orderid' => $this->oOrder->getOrderid()]);
    }

    public function getLogisticfee()
    {
        return $this->oOrder->getLogisticfee();
    }

    public function toSession()
    {
        $oSession = new Session('order');
        $oSession->set('obj', $this->oOrder);
    }

    public function fromSession()
    {
        $oSession = new Session('order');
        $this->oOrder = $oSession->get('obj');
        return $this->oOrder;
    }

    public function hasSession()
    {
        $oSession = new Session('order');
        if ($oSession->has('obj')) {
            $this->oOrder = $oSession->get('obj');
            return true;
        }
        return false;
    }
}