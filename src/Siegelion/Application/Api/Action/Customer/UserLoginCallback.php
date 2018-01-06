<?php
namespace Siegelion\Application\Api\Action\Customer;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Service\OAuth\WxLogin;
use Siegelion\Service\Business\CustomerManager;
use Overtrue\Socialite\AuthorizeFailedException;

class UserLoginCallback extends Action implements RestfulActionInterface
{   
    // [GET] /login/callback
    public function get($aParams, $aQuery)
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            return JsonUtils::parseObject($oCustomerManager->get());
        }

        try {
            $oWxAuth = new WxLogin();
            $oWxUser = $oWxAuth->user();
            
            if (!$oCustomerManager->hasByWxid($oWxUser->getId())) {
                $oCustomerManager->createByWx($oWxUser);
            }
            $oCustomerManager->toSession();
            
            $oSession = new Session('wxlogin');

            $oResponse = new Response();
            $oResponse->redirect($oSession->get('redirecturl'));
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