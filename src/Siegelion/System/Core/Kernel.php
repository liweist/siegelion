<?php
namespace Siegelion\System\Core;

use Siegelion\System\Framework\HttpBundle\RequestParser;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Framework\UtilityBundle\StringUtils;

class Kernel
{
    public function __construct()
    {

    }

    public function boot()
    {
        $this->httpRequest();
        $this->httpResponse();
    }

    public function httpRequest()
    {
        $oRequestParser = new RequestParser();
        $aRequest = $oRequestParser->parse();

        $aRouting = JsonUtils::loadJson(PATH_APP.'routing.json');
        $sAppName = implode('\\', StringUtils::ucfirstStrings($aRequest['subdomain']));

        if (!isset($aRouting['routing']['apps'][$sAppName])) {
            $sAppName = $aRouting['routing']['defaultApp'];
        }
        $aApp = $aRouting['routing']['apps'][$sAppName];  
        
        $sAppPath = 'Siegelion\Application\\'.$sAppName.'\App';
        $oApp = new $sAppPath();
        $oApp->run();

        $aRoutes = Router::getRoutes();
        if (isset($aRoutes[$aRequest['url']])) {
            $sDefaultDelegate = 'Siegelion\Application\\'.$sAppName.'\Delegate\\'.$aRoutes[$aRequest['url']];
            $delegate = new $sDefaultDelegate($sAppName, $aApp['view']);
            echo $delegate->showPage();
        }
    }

    public function httpResponse() {
        $aHttpOptions = JsonUtils::loadJson(PATH_SYS.'Config/http.json');
        $oResponse = new Response($aHttpOptions['response']);
        $oResponse->headerBuilder();
    }
}