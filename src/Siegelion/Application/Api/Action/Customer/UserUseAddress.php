<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;

class UserUseAddress extends Action implements RestfulActionInterface
{   
    public function get($aParams, $aQuery)
    {   

    }

    // [POST] /user/use/address/:id
    public function post($aParams, $aQuery, $aRequest)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $oCustomerManager->setDefaultAddress($aParams['id']);
            return JsonUtils::parseSuccess([
                'currentAddress' => $oCustomerManager->setUsingAddress($aParams['id'])
            ]);
        }
        return JsonUtils::parseError(20, 'customer not found');
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