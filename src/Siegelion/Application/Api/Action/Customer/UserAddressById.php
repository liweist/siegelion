<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;

class UserAddressById extends Action implements RestfulActionInterface
{   
    // [GET] /address/:id
    public function get($aParams, $aQuery)
    {   
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            return JsonUtils::parseObject($oCustomerManager->getAddress($aParams['id']));
        }
        return JsonUtils::parseError(20, 'customer not found');
    }

    public function post($aParams, $aQuery, $aRequest)
    {
        
    }

    public function put($aParams, $aQuery, $aRequest)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $aAddress = $aRequest['address'];
            $oCustomerManager->setAddress($aParams['id'], $aAddress['location'], $aAddress['name'], $aAddress['tel']);
            return JsonUtils::parseSuccess();
        }
        return JsonUtils::parseError(20, 'customer not found');
    }

    public function patch($aParams, $aQuery, $aRequest)
    {

    }

    public function delete($aParams, $aQuery, $aRequest)
    {

    }
}