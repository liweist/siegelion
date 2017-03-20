<?php
namespace Siegelion\System\Framework\BaseBundle;

interface RestfulActionInterface
{
    public function get($aUri, $aParams, $aBody);
    public function post($aUri, $aParams, $aBody);
    public function put($aUri, $aParams, $aBody);
    public function patch($aUri, $aParams, $aBody);
    public function delete($aUri, $aParams, $aBody);
}