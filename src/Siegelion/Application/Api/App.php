<?php
namespace Siegelion\Application\Api;

use Siegelion\System\Framework\BaseBundle\AppKernel;
use Siegelion\System\Framework\BaseBundle\AppInterface;
use Siegelion\System\Core\Router;
use Siegelion\Service\Security\Sso\Authorization;
use Siegelion\Service\Security\Sso\UserAccessControl;

class App extends AppKernel implements AppInterface
{
    public function run()
    {
        //customer api
        Router::setAction('/login', 'Customer\UserLogin');
        Router::setAction('/login/callback', 'Customer\UserLoginCallback');
        Router::setAction('/users', 'Customer\UserList');
        Router::setAction('/user', 'Customer\UserInfo');
        Router::setAction('/user/address', 'Customer\UserAddress');
        Router::setAction('/user/address/:id', 'Customer\UserAddressById');
        Router::setAction('/user/use/address/:id', 'Customer\UserUseAddress');
        Router::setAction('/user/addresses', 'Customer\UserAddresses');
        Router::setAction('/user/customs', 'Customer\UserCustoms');
        Router::setAction('/user/:customerId', 'Customer\UserInfoById');
        
        //cart api
        Router::setAction('/cart', 'Cart\Cart');
        Router::setAction('/cart/:cartItemId', 'Cart\CartItem');

        //product api
        Router::setAction('/products', 'Product\Products');
        Router::setAction('/product/:productId', 'Product\Product');

        //trade api
        Router::setAction('/orders/open', 'Trade\OpenOrders');
        Router::setAction('/orders/paid', 'Trade\PaidOrders');
        Router::setAction('/orders/closed', 'Trade\ClosedOrders');
        Router::setAction('/order', 'Trade\Order');
        Router::setAction('/order/:orderId', 'Trade\OrderInfo');

        //logistic api
        Router::setAction('/logistics', 'Logistic\Logistics');
        Router::setAction('/logistic/:logisticId', 'Logistic\Logistic');
        Router::setAction('/logistic/:logisticId/trace', 'Logistic\LogisticTrace');

        //pay api
        Router::setAction('/pay/wxpay', 'Pay\WxPay');
        Router::setAction('/pay/wxnotify', 'Pay\WxNotify');
        Router::setAction('/pay/alipay', 'Pay\AliPay');
        Router::setAction('/pay/alinotify', 'Pay\AliNotify');
    }
}