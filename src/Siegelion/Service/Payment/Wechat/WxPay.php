<?php
namespace Siegelion\Service\Payment\Wechat;

use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Service\Payment\PaymentInterface;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order as WxOrder;

class WxPay implements PaymentInterface
{
    private $oPayment;
    private $oPrepayResult;
    private $oAdaptedOrder;

    public function __construct(WxAdaptedOrder $oAdaptedOrder = null)
    {
        $this->oAdaptedOrder = $oAdaptedOrder;
        $aOptions = [
            'app_id' => '', //your weixin app_id
            'secret' => '', //your weixin secret
            'payment' => [
                'merchant_id' => '',  //your weixin merchant_id
                'key'         => '',  //your weixin appkey
                'cert_path'   => PATH_SEV.'Payment/Wechat/Cert/apiclient_cert.pem', //put your cert in this file
                'key_path'    => PATH_SEV.'Payment/Wechat/Cert/apiclient_key.pem',  //put your cert_key in this file
                'notify_url'  => 'http://api.couqiao.me/pay/wxnotify' //example nofify url
            ]
        ];
        $oApp = new Application($aOptions);
        $this->oPayment = $oApp->payment;
    }

    public function prepay()
    {
        $aOrderRequest = [
            'trade_type' => 'JSAPI',
            'body' => $this->oAdaptedOrder->getTitle(),
            'detail' => $this->oAdaptedOrder->getDescription(),
            'out_trade_no' => $this->oAdaptedOrder->getOrderuid(),
            'total_fee' => $this->oAdaptedOrder->getPayprice(),
            'openid' => $this->oAdaptedOrder->getWxid()
        ];
        
        $oWxOrder = new WxOrder($aOrderRequest);
        $this->oPrepayResult = $this->oPayment->prepare($oWxOrder);
        
        $oSession = new Session('payment');
        $oSession->set('wxpay_prepayid', $this->oPrepayResult->prepay_id);

        if ($this->oPrepayResult->return_code == 'SUCCESS' && $this->oPrepayResult->result_code == 'SUCCESS'){
            $oSession->set('wxpay_result', 'SUCCESS');
            return true;
        }
        
        $oSession->set('wxpay_result', 'FAIL');
        return false;
    }

    public function getConfigForPayment()
    {
        return $this->oPayment->configForPayment($this->oPrepayResult->prepay_id);
    }

    public function getPrepayError()
    {
        if ($this->oPrepayResult->return_code == 'SUCCESS') {
            return $this->oPrepayResult->err_code_des;
        }
        return $this->oPrepayResult->return_msg;
    }

    public function handlePaymentResult(callable $callback)
    {
        $oResponse = $this->oPayment->handleNotify(function($aNotify, $bSuccessful) use ($callback){
            return $callback($aNotify, $bSuccessful);
        });
        $oResponse->send();
    }
}