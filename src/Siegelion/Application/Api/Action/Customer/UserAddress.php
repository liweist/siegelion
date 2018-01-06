<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;

class UserAddress extends Action implements RestfulActionInterface
{   
    // [GET] /user/address
    public function get($aParams, $aQuery)
    {   
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $oCartManager = new CartManager();
            if ($oCartManager->hasSession()) {
                $oAddress = $oCustomerManager->getDefaultAddress();
                if ($oCustomerManager->hasUsingAddress()) {
                    $oAddress = $oCustomerManager->getUsingAddress();
                }

                if (is_null($oAddress)) {
                    return JsonUtils::parseArray([
                        'currentAddress' => [],
                        'logisticFee' => 0
                    ]);
                }

                return JsonUtils::parseArray([
                    'currentAddress' => $oAddress,
                    'logisticFee' => $oCartManager->getLogisticFee($oAddress->getProvince())
                ]);
            }
            return JsonUtils::parseError(20, 'cart not found');
        }
        return JsonUtils::parseError(20, 'customer not found');
    }

    // [POST] /user/address
    public function post($aParams, $aQuery, $aRequest)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $aAddress = $aRequest['address'];
            $oCustomerManager->addAddress($aAddress['location'], $aAddress['name'], $aAddress['tel']);
            return JsonUtils::parseSuccess();
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