<?php
namespace Siegelion\System\Framework\UtilityBundle;

class JsonUtils
{
    public static function loadJson($sFilepath)
    {
        $sJsonData = file_get_contents($sFilepath);
        return json_decode($sJsonData, true);
    }
}