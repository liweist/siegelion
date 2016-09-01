<?php
namespace System\Core;

use System\Framework\HttpBundle\RequestParser;
use System\Framework\UtilityBundle\JsonUtils;
use System\Framework\UtilityBundle\StringUtils;

class Kernel
{
    public function __construct()
    {

    }

    public function boot()
    {
        $this->routing();
    }

    public function routing()
    {
        $oRequestParser = new RequestParser();
        $aRequest = $oRequestParser->parse();

        $aRouting = JsonUtils::loadJson(PATH_APP.'routing.json');
        $sAppName = implode('\\', StringUtils::ucfirstStrings($aRequest['subdomain']));
        $aApp = $aRouting['apps'][$sAppName];

        $sAppPath = 'Application\\'.$sAppName.'\App';
        $oApp = new $sAppPath();
        $oApp->run();

        $aRoutes = Router::getRoutes();
        if (isset($aRoutes[$aRequest['url']])) {
            $sDefaultDelegate = 'Application\\'.$sAppName.'\Delegate\\'.$aRoutes[$aRequest['url']];
            $delegate = new $sDefaultDelegate($sAppName, $aApp['view']);
            echo $delegate->showPage();
        }
    }
}