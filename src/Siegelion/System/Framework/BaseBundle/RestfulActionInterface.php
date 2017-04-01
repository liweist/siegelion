<?php
namespace Siegelion\System\Framework\BaseBundle;

interface RestfulActionInterface
{
    public function get($aParams, $aQuery);
    public function post($aParams, $aQuery, $aRequest);
    public function put($aParams, $aQuery, $aRequest);
    public function patch($aParams, $aQuery, $aRequest);
    public function delete($aParams, $aQuery, $aRequest);
}
