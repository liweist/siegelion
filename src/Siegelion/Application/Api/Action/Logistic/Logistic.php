<?php
namespace Siegelion\Application\Api\Action\Logistic;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\LogisticManager;
use Siegelion\Service\Business\OrderManager;

class Logistic extends Action implements RestfulActionInterface
{   
    //[GET] /logistic/:logisticId
    public function get($aParams, $aQuery)
    {   
        $oLogisticManager = new LogisticManager($aParams['logisticId']);
        $oOrderManager = new OrderManager($oLogisticManager->get()->getOrderid());
        return JsonUtils::parseArray([
            'logistic' => $oLogisticManager->get(),
            'order' => $oOrderManager->get()
        ]);
    }

    //[POST]
    public function post($aParams, $aQuery, $aRequest)
    {
        
    }

    //[PUT] 
    public function put($aParams, $aQuery, $aRequest)
    {
        
    }

    //[PATCH] /logistic/:logisticId
    public function patch($aParams, $aQuery, $aRequest)
    {
        
    }

    public function delete($aParams, $aQuery, $aRequest)
    {
        
    }
}