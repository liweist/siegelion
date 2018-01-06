<?php
namespace Siegelion\System\Framework\HttpBundle;

class Response
{
    public $aOptions;

    public function __construct($aOptions = [])
    {
        $this->aOptions = $aOptions;
    }

    public function redirect($sUrl, $aQuery = []) {
        if (!empty($aQuery)) {
            $sUrl .= '?'.http_build_query($aQuery);
        }
        header('Location: '.$sUrl);
    }

    public function headerBuilder()
    {
        header('X-Powered-By: SiegeLion '.VERSION);
        header('X-XSS-Protection: 1; mode=block;');
        header('X-Frame-Options: nosniff');
        if (isset($this->aOptions['crossOriginDomain'])) {
            $sAllowOrigin = $this->aOptions['rootDomain'];
            if (in_array($this->aOptions['origin'], $this->aOptions['crossOriginDomain'])) {
                $sAllowOrigin = $this->aOptions['origin'];
            }
            header('Access-Control-Allow-Origin: '.$sAllowOrigin);
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH');
        }
    }

    public function allowHeader()
    {
        header('Allow: GET, POST, PUT, DELETE, PATCH');
    }

    public function write($sDoc)
    {
        echo $sDoc;
    }
}