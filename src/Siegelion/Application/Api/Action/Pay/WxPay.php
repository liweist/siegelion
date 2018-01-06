<?php
namespace Siegelion\Application\Api\Action\Pay;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\OrderManager;
use Siegelion\Service\Payment\PaymentGateway;

class WxPay extends Action implements RestfulActionInterface
{   
    // [GET] /pay/wxpay
    public function get($aParams, $aQuery)
    {
        $oOrderManager = new OrderManager();
        if ($oOrderManager->hasSession()) {
            $oPaymentGateway = new PaymentGateway($oOrderManager->get(), 'wxpay');
            if ($oPaymentGateway->prepay()) {
                return $this->renderHtml('wxpay.html', ['json' => $oPaymentGateway->getConfigForPayment()]);
            }
            return JsonUtils::parseError(30, $oPaymentGateway->getPrepayError());
        }
        return JsonUtils::parseError(20, 'order not exists');
    }

    // [POST] /pay/wxpay
    public function post($aParams, $aQuery, $aRequest)
    {
        $oOrderManager = new OrderManager();
        if ($oOrderManager->hasSession()) {
            $oPaymentGateway = new PaymentGateway($oOrderManager->get(), 'wxpay');
            if ($oPaymentGateway->prepay()) {
                return $oPaymentGateway->getConfigForPayment();
            }
            return JsonUtils::parseError(30, $oPaymentGateway->getPrepayError());
        }
        return JsonUtils::parseError(20, 'order not exists');
    }

    public function put($aParams, $aQuery, $aRequest)
    {

    }

    public function patch($aParams, $aQuery, $aRequest)
    {

    }

    public function delete($aParams, $aQuery, $aRequest)
    {

    }
}