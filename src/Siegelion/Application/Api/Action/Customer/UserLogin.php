<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\Service\OAuth\WxLogin;
use Overtrue\Socialite\AuthorizeFailedException;

class UserLogin extends Action implements RestfulActionInterface
{   
    // [GET] /login
    public function get($aParams, $aQuery)
    {
        try {
            $oWxAuth = new WxLogin();
            $oWxAuth->auth();
        } catch(AuthorizeFailedException $e) {
            return JsonUtils::parseError(1001, 'Authorize failed');
        }
    }

    public function post($aParams, $aQuery, $aRequest)
    {

    }

    public function put($aParams, $aQuery, $aRequest)
    {

    }

    public function patch($aParams, $aQuery, $aBody)
    {

    }

    public function delete($aParams, $aQuery, $aRequest)
    {

    }
}