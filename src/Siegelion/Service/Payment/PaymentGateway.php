<?php
namespace Siegelion\Service\Payment;

use Siegelion\Storage\Persistence\Entity\Order;
use Siegelion\Service\Payment\Wechat\WxPay;
use Siegelion\Service\Payment\Wechat\WxAdaptedOrder;

class PaymentGateway
{
    private $oPayment;
    private $oOrder;

    public function __construct($oOrder, $sGateway)
    {
        switch($sGateway) {
            case 'wxpay':
                $oWxAdaptedOrder = new WxAdaptedOrder($oOrder);
                $this->oPayment = new WxPay($oWxAdaptedOrder);
                break;

            case 'alipay':
                break;
            
            default:
                break;
        }
    }

    public function prepay()
    {
        return $this->oPayment->prepay();
    }

    public function getPrepayError()
    {
        return $this->oPayment->getPrepayError();
    }

    public function handlePaymentResult(callable $callback)
    {
        $this->oPayment->handlePaymentResult($callback);
    }

    public function getConfigForPayment()
    {
        return $this->oPayment->getConfigForPayment();
    }
}