<?php
namespace Siegelion\Application\Api\Action\Trade;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\OrderManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\Service\Business\CustomerManager;

class OrderInfo extends Action implements RestfulActionInterface
{   
    // [GET] /order/:orderId
    public function get($aParams, $aQuery)
    {
        $oOrderManager = new OrderManager($aParams['orderId']);
        if ($oOrderManager->has()) {
            $oOrderManager->toSession();
            return JsonUtils::parseArray([
                'address' => $oOrderManager->getAddress(),
                'logisticfee' => $oOrderManager->getLogisticfee(),
                'order' => $oOrderManager->get(),
                'items' => $oOrderManager->getItems(),
                'logistics' => $oOrderManager->getLogistics()
            ]);
        }
        return JsonUtils::parseError(20, 'order not found');
    }

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