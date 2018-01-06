<?php
namespace Siegelion\Application\Api\Action\Pay;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Service\DataManager\CustomerManager;
use Siegelion\Service\Trade\Order;
use Siegelion\Service\Trade\Cart;
use Siegelion\Service\Trade\Sale;

class AliPay extends Action implements RestfulActionInterface
{   
    public function get($aParams, $aQuery)
    {

    }

    // [POST] /pay
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