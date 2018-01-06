<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\Service\Business\CustomerManager;

class UserCustoms extends Action implements RestfulActionInterface
{   
    public function get($aParams, $aQuery)
    {   
        
    }

    // [POST] /user/customs
    public function post($aParams, $aQuery, $aRequest)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $oCustomerManager->personalAuthority($aRequest['name'], $aRequest['personalid']);
            return JsonUtils::parseSuccess();
        }
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