<?php
namespace Siegelion\System\Framework\HttpBundle;

class Response
{
    public $aOptions;

    public function __construct($aOptions = array())
    {
        $this->aOptions = $aOptions;
    }

    public function redirect($url) {
        header('Location: '.$url);
    }

    public function headerBuilder()
    {
        header('X-Powered-By: SiegeLion '.VERSION);
        header('X-XSS-Protection: 1; mode=block;');
        header('X-Frame-Options: nosniff');
        if (isset($this->aOptions['crossOriginDomain'])) {
            header('Access-Control-Allow-Origin: '.$this->aOptions['crossOriginDomain']);
        }
    }

    public function write($sDoc)
    {
        echo $sDoc;
    }

    public function jsonWrite($aData)
    {
        $sOutput = '';
        if (!empty($aData)) {
            $sOutput = json_encode($aData);
        }
        $this->write($sOutput);
    }
}
