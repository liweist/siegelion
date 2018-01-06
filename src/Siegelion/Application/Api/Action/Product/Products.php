<?php
namespace Siegelion\Application\Api\Action\Product;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\Business\ProductManager;

class Products extends Action implements RestfulActionInterface
{   
    // [GET] /products
    public function get($aParams, $aQuery)
    {
        $oProductManager = new ProductManager();
        return JsonUtils::parseArray($oProductManager->getAll());
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