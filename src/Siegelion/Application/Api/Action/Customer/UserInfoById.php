<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;

class UserInfoById extends Action implements RestfulActionInterface
{   
    // [GET] /user/:id
    public function get($aParams, $aQuery)
    {   
        if (isset($aParams['customerId'])) {
            $oCustomerManager = new CustomerManager($aParams['customerId']);
            if ($oCustomerManager->has()) {
                return JsonUtils::parseObject($oCustomerManager->get());
            }
            return JsonUtils::parseError(20, 'customer not found');
        }
        return JsonUtils::parseError(10, 'missing params');
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