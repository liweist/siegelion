<?php
namespace Siegelion\Application\Api\Action\Logistic;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\LogisticManager;
use Siegelion\Service\Business\OrderManager;
use Siegelion\Service\Logistic\Traces;

class LogisticTrace extends Action implements RestfulActionInterface
{   
    //[GET] /logistic/:logisticId/trace
    public function get($aParams, $aQuery)
    {   
        $oLogisticManager = new LogisticManager($aParams['logisticId']);
        $oTraces = new Traces(
            $oLogisticManager->get()->getCompanycode(),
            $oLogisticManager->get()->getTrackingnumber()
        );
        $aTraces = array_reverse($oTraces->getTracesData()['Traces']);
        return JsonUtils::parseArray($aTraces);
    }

    //[POST]
    public function post($aParams, $aQuery, $aRequest)
    {
        
    }

    //[PUT] 
    public function put($aParams, $aQuery, $aRequest)
    {
        
    }

    //[PATCH]
    public function patch($aParams, $aQuery, $aRequest)
    {
        
    }

    public function delete($aParams, $aQuery, $aRequest)
    {
        
    }
}