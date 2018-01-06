<?php
namespace Siegelion\Application\Api\Action\Pay;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\OrderManager;
use Siegelion\Service\Business\LogisticManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\Service\Payment\Wechat\WxPay;

class WxNotify extends Action implements RestfulActionInterface
{   
    public function get($aParams, $aQuery)
    {
        
    }

    // [POST] /pay/wxnotify
    public function post($aParams, $aQuery, $aRequest)
    {
        $oWxPay = new WxPay();
        $oWxPay->handlePaymentResult(function($oPaymentResult, $bSuccessful) {
            $oOrderManager = new OrderManager();
            $oOrderManager->getByUid($oPaymentResult->out_trade_no);

            if (!$oOrderManager->has()) {
                return true;
            }

            if ($bSuccessful) {
                $oOrderManager->transact('wxpay', $oPaymentResult);
                $oOrderManager->paid(true);

                $oLogisticManager = new LogisticManager();
                $oLogisticManager->create($oOrderManager->get());
                $oCartManager = new CartManager($oOrderManager->get()->getCartid());
                if ($oCartManager->hasCustomsItem()) {
                    $oLogisticManager->create($oOrderManager->get());
                }
            } else {
                $oOrderManager->paid(false);
            }
            return true;
        });
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