<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\Service\Business\CustomerManager;

class UserInfo extends Action implements RestfulActionInterface
{   
    // [GET] /user
    public function get($aParams, $aQuery)
    {   
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            return JsonUtils::parseObject($oCustomerManager->get());
        }
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