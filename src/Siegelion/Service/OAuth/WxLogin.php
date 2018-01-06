<?php
namespace Siegelion\Service\OAuth;

use Siegelion\System\Framework\HttpBundle\Session;
use EasyWeChat\Foundation\Application;

class WxLogin
{
    private $oAuth;

    public function __construct() {
        $aOptions = [
            'app_id' => '', //your weixin app_id
            'secret' => '', //your weixin secet
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => 'http://api.couqiao.me/login/callback', //example callback url
            ]
        ];
        $oApp = new Application($aOptions);
        $this->oAuth = $oApp->oauth;
    }

    public function auth() {
        $this->oAuth->redirect()->send();
    }

    public function user() {
        return $this->oAuth->user();
    }
}