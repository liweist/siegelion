<?php
namespace Siegelion\Application\Api\Action\Trade;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\OrderManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\Service\Business\CustomerManager;

class Order extends Action implements RestfulActionInterface
{   
    // [GET] /order
    public function get($aParams, $aQuery)
    {
        $oOrderManager = new OrderManager();
        if ($oOrderManager->hasSession()) {
            return JsonUtils::parseObject($oOrderManager->get());
        }
        return JsonUtils::parseError(20, 'order not found');
    }

    // [POST] /order
    public function post($aParams, $aQuery, $aRequest)
    {
        $oCartManager = new CartManager();
        $oCustomerManager = new CustomerManager();
        if ($oCartManager->hasSession()) {
            if ($oCustomerManager->hasSession()) {
                $oAddress = $oCustomerManager->getUsingAddress();
                $oOrderManager = new OrderManager();
                $oOrderManager->create(
                    $oCartManager->get(), 
                    $oAddress,
                    $oCartManager->getLogisticFee($oAddress->getProvince()),
                    $oCartManager->getTotalprice(), 
                    $oCartManager->getDiscount()
                );
                $oOrderManager->toSession();
                $oCartManager->checkout();
                return JsonUtils::parseSuccess(['order' => $oOrderManager->get()]);
            }
            return JsonUtils::parseError(20, 'customer not found');
        }
        return JsonUtils::parseError(20, 'cart not found');
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