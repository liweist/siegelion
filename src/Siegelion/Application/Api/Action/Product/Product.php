<?php
namespace Siegelion\Application\Api\Action\Product;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\Service\Business\ProductManager;

class Product extends Action implements RestfulActionInterface
{   
    // [GET] /product/:productId
    public function get($aParams, $aQuery)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            $oCartManager = new CartManager();
            if ($oCustomerManager->hasCart()) {
                $oCartManager = new CartManager($oCustomerManager->getCart()->getCartid());
                $oCartManager->toSession();
            } else {
                $oCartManager->create($oCustomerManager->get());
                $oCartManager->toSession();
            }

            $oProductManager = new ProductManager($aParams['productId']);
            return JsonUtils::parseArray([
                'product' => $oProductManager->get(),
                'cartitemCount' => strval($oCartManager->getItemCount())
            ]);
        }
        return JsonUtils::parseError(10, 'user not exists');
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