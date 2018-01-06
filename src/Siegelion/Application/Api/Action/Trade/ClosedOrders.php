<?php
namespace Siegelion\Application\Api\Action\Trade;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\OrderManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\Service\Business\CustomerManager;

class ClosedOrders extends Action implements RestfulActionInterface
{   
    // [GET] /orders
    public function get($aParams, $aQuery)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $aClosedOrders = $oCustomerManager->getClosedOrders();
            
            $aResponse = [];
            foreach ($aClosedOrders as $oOrder) {
                $oOrderManager = new OrderManager($oOrder->getOrderid());
                $aResponse[] = [
                    'order' => $oOrderManager->get(),
                    'items' => $oOrderManager->getItems()
                ];
            }
            return JsonUtils::parseArray($aResponse);
        }
        return JsonUtils::parseError(20, 'customer not found');
    }

    // [POST]
    public function post($aParams, $aQuery, $aRequest)
    {
        
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