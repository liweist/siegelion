<?php
namespace Siegelion\System\Core;

use Siegelion\System\Framework\HttpBundle\RequestParser;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Framework\UtilityBundle\StringUtils;

class Kernel
{
    private $aConfig;

    public function __construct()
    {
        $this->aConfig = JsonUtils::loadJson(PATH_CONF);
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

        $sSubdomainName = implode('\\', StringUtils::ucfirstStrings($aRequest['subdomain']));

        if (!isset($this->aConfig['routing']['subdomains'][$sSubdomainName])) {
            $sSubdomainName = $this->aConfig['routing']['defaultSubdomain'];
        }
        $aApp = $this->aConfig['routing']['subdomains'][$sSubdomainName];
        
        $sAppPath = 'Siegelion\Application\\'.$aApp['app'].'\App';
        $oApp = new $sAppPath();
        $oApp->run();
        
        $sAction = 'Siegelion\Application\\'.$aApp['app'].'\Action\\'.$aApp['defaultAction'];
        $aRoutes = Router::getRoutes();
        if (isset($aRoutes[$aRequest['url']])) {
            $sAction = 'Siegelion\Application\\'.$aApp['app'].'\Action\\'.$aRoutes[$aRequest['url']];
        }
        $action = new $sAction($aApp['app'], $aApp['view']);
        echo $action->index();
    }

    public function httpResponse() {
        $oResponse = new Response($this->aConfig['http']['response']);
        $oResponse->headerBuilder();
    }
}