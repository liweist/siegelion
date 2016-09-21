<?php
namespace Siegelion\System\Framework\HttpBundle;

class Response
{
    public $aOptions;

    public function __construct($aOptions)
    {
        $this->aOptions = $aOptions;
    }

    public function headerBuilder()
    {
        header('X-XSS-Protection: 1; mode=block;');
        header('X-Frame-Options: nosniff');
        if (isset($this->aOptions['crossOriginDomain'])) {
            header('Access-Control-Allow-Origin: '.$this->aOptions['crossOriginDomain']);
        }
    }

}