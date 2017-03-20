<?php
namespace Siegelion\System\Core;

use Siegelion\System\Framework\HttpBundle\RequestParser;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Framework\UtilityBundle\StringUtils;
use Siegelion\System\Exception\ApplicationException;

class Kernel
{
    private $aConfig;
    private $aRequest;
    private $oAction;
    private $aApp;

    public function __construct()
    {
        $this->aConfig = JsonUtils::loadJson(PATH_CONF);
    }

    public function boot()
    {
        try {
            $this->httpRequest();
            $this->httpResponse();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function httpRequest()
    {
        $oRequestParser = new RequestParser();
        $this->aRequest = $oRequestParser->parse();

        $sSubdomainName = implode('.', $this->aRequest['subdomain']);

        if (!isset($this->aConfig['routing']['subdomains'][$sSubdomainName])) {
            $sSubdomainName = $this->aConfig['routing']['defaultSubdomain'];
        }
        $this->aApp = $this->aConfig['routing']['subdomains'][$sSubdomainName];
        $sAppPath = 'Siegelion\Application\\'.$this->aApp['app'].'\App';
        if (!class_exists($sAppPath)) {
            throw ApplicationException::appNotExist($sAppPath);
        }
        $oApp = new $sAppPath();
        $oApp->run();
        
        $aRoutes = Router::getRoutes();
        if (isset($this->aApp['restful']) && $this->aApp['restful']) {
            if (!isset($this->aRequest['path'][0])) {
                throw ApplicationException::actionRequired();
            }
            $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$aRoutes['/'.$this->aRequest['path'][0]];
            $this->aApp['view'] = null;
        } else {
            $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$this->aApp['defaultAction'];
            if (isset($aRoutes[$this->aRequest['url']])) {
                $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$aRoutes[$this->aRequest['url']];
            }
        }
        
        if (!class_exists($sAction)) {
            throw ApplicationException::actionNotExist($sAction);
        }
        $this->oAction = new $sAction($this->aApp['app'], $this->aApp['view']);
    }

    public function httpResponse() {
        $oResponse = new Response($this->aConfig['http']['response']);
        $oResponse->headerBuilder();

        if (isset($this->aApp['restful']) && $this->aApp['restful']) {
            $aPathGroup = array_chunk($this->aRequest['path'], 2);
            $sCallback = strtolower($this->aRequest['method']);
            $aUri = array();
            foreach ($aPathGroup as $iKey => $aGroup) {
                if ($iKey > 0) {
                    $sCallback .= ucfirst($aGroup[0]);
                }
                if (!isset($aGroup[1])) {
                    $aGroup[1] = '';
                }
                $aUri[$aGroup[0]] = $aGroup[1];
            }

            $aParams = $this->aRequest['query'];
            $aBody = JsonUtils::toArray($this->aRequest['input']);
            $aRoutes = Router::getRoutes();
            $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$aRoutes['/'.$this->aRequest['path'][0]];
            if (!method_exists($sAction, $sCallback)) {
                throw ApplicationException::callbackNotExist($sAction, $sCallback);
            }
            $oResponse->write($this->oAction->$sCallback($aUri, $aParams, $aBody));
        } else {
            $oResponse->write($this->oAction->index());
        }
    }
}