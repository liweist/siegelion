<?php
namespace Siegelion\Application\Api\Action\Cart;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\CustomerManager;
use Siegelion\Service\Business\CartManager;
use Siegelion\Service\Business\ProductManager;

class Cart extends Action implements RestfulActionInterface
{   
    //[GET] /cart
    //list all product and quantity in cart
    public function get($aParams, $aQuery)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            if ($oCustomerManager->hasCart()) {
                $oCartManager = new CartManager($oCustomerManager->getCart()->getCartid());
                $oCartManager->toSession();
                return JsonUtils::parseArray([
                    'items' => $oCartManager->getItems(),
                    'totalprice' => strval($oCartManager->getTotalprice()),
                    'hascustomsitem' => $oCartManager->hasCustomsItem()
                ]);
            } else {
                return JsonUtils::parseArray([
                    'items' => [],
                    'totalprice' => '0',
                    'hascustomsitem' => false
                ]);
            }
        }
        return JsonUtils::parseError(20, 'user not exists');
    }

    //[POST] /cart
    //add item and quantity to cart
    public function post($aParams, $aQuery, $aRequest)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            if ($oCustomerManager->hasCart()) {
                $oCartManager = new CartManager($oCustomerManager->getCart()->getCartid());
                $oCartManager->toSession();
            } else {
                $oCartManager = new CartManager();
                $oCartManager->create($oCustomerManager->get());
                $oCartManager->toSession();
            }

            $oProductManager = new ProductManager($aRequest['productid']);
            $oCartManager->addItem($oProductManager->get(), $aRequest['quantity'], $aRequest['sku']);
            return JsonUtils::parseArray([
                'result' => 'success',
                'cartitemCount' => strval($oCartManager->getItemCount())
            ]);
        }
        return JsonUtils::parseError(20, 'user not exists');
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