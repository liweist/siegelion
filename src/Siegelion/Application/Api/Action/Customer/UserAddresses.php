<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;

class UserAddresses extends Action implements RestfulActionInterface
{   
    // [GET] /user/addresses
    public function get($aParams, $aQuery)
    {   
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            return JsonUtils::parseArray($oCustomerManager->getAddresses());
        }
        return JsonUtils::parseError(20, 'customer not found');
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