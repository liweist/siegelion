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
            echo $e;
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

        $sActionName = Router::match($this->aRequest['url']);
        if (isset($this->aApp['restful']) && $this->aApp['restful']) {
            if ($this->aRequest['url'] == '/') {
                throw ApplicationException::actionRequired();
            }
            if (is_null($sActionName)) {
                throw ApplicationException::actionNotExist($this->aRequest['url']);
            }
            $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$sActionName;
            $this->aApp['view'] = null;
        } else {
            $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$this->aApp['defaultAction'];
            if (!is_null($sActionName)) {
                $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$sActionName;
            }
        }
        
        if (!class_exists($sAction)) {
            throw ApplicationException::actionNotExist($sAction);
        }
        $this->oAction = new $sAction($this->aApp['app'], $this->aApp['view']);
    }

    public function httpResponse() {
        $aResponseOptions = $this->aConfig['http']['response'];
        $aResponseOptions['origin'] = $this->aRequest['origin'];
        $oResponse = new Response($aResponseOptions);
        $oResponse->headerBuilder();

        if (isset($this->aApp['restful']) && $this->aApp['restful']) {
            $sCallback = strtolower($this->aRequest['method']);
            
            $sActionName = Router::match($this->aRequest['url']);
            if (is_null($sActionName)) {
                throw ApplicationException::actionNotExist($this->aRequest['url']);
            }
            $sAction = 'Siegelion\Application\\'.$this->aApp['app'].'\Action\\'.$sActionName;
            if (!method_exists($sAction, $sCallback)) {
                if ($sCallback == 'options') {
                    $oResponse->allowHeader();
                } else {
                    throw ApplicationException::callbackNotExist($sAction, $sCallback);
                }
            } else {
                $aParams = Router::getParams();
                $aQuery = $this->aRequest['query'];
                if ($sCallback == 'get') {
                    $oResponse->write($this->oAction->get($aParams, $aQuery));
                } else {
                    $aRequest = JsonUtils::toArray($this->aRequest['input']);
                    $oResponse->write($this->oAction->$sCallback($aParams, $aQuery, $aRequest));
                }
            }
        } else {
            $oResponse->write($this->oAction->index());
        }
    }
}