<?php
namespace Siegelion\Application\Api\Action\Cart;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\Service\Business\CartManager;

class CartItem extends Action implements RestfulActionInterface
{   
    //[GET] /cart/:cartItemId
    //get item info from cart
    public function get($aParams, $aQuery)
    {
        $oCartManager = new CartManager();
        if ($oCartManager->hasSession()) {
            $oCartitem = $oCartManager->getItem($aParams['cartItemId']);
            return JsonUtils::parseObject($oCartitem);
        }
    }

    //[POST]
    public function post($aParams, $aQuery, $aRequest)
    {
        
    }

    //[PUT] 
    public function put($aParams, $aQuery, $aRequest)
    {
        
    }

    //[PATCH] /cart/:cartItemId
    //update item quantity
    public function patch($aParams, $aQuery, $aRequest)
    {
        $oCartManager = new CartManager();
        if ($oCartManager->hasSession()) {
            $oCartManager->updateItemQuantity($aParams['cartItemId'], $aRequest['quantity']);
            return JsonUtils::parseArray([
                'result' => 'success',
                'items' => $oCartManager->getItems(),
                'totalprice' => strval($oCartManager->getTotalprice())
            ]);
        }
        return JsonUtils::parseError(20, 'cart not found');
    }

    //[DELETE] /cart/:cartItemId
    //remove item from cart
    public function delete($aParams, $aQuery, $aRequest)
    {
        $oCartManager = new CartManager();
        if ($oCartManager->hasSession()) {
            $oCartManager->removeItem($aParams['cartItemId']);
            return JsonUtils::parseArray([
                'result' => 'success',
                'items' => $oCartManager->getItems(),
                'totalprice' => strval($oCartManager->getTotalprice())
            ]);
        }
        return JsonUtils::parseError(20, 'cart not found');
    }
}