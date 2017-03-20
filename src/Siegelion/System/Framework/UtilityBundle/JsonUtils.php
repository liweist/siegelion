<?php
namespace Siegelion\System\Framework\UtilityBundle;

class JsonUtils
{
    public static function loadJson($sFilepath)
    {
        $sJsonData = file_get_contents($sFilepath);
        return json_decode($sJsonData, true);
    }

    public static function toArray($sJson)
    {   
        if (!empty($sJson)) {
            return json_decode($sJson, true);
        }
        return array();
    }

    public static function toJsonData($aData)
    {
        return json_encode($aData);
    }

    public static function toJsonError($iErrorCode, $sErrorMsg)
    {
        $aError = array(
            'errorcode' => $iErrorCode,
            'errormsg' => $sErrorMsg
        );
        return json_encode($aError);
    }
}