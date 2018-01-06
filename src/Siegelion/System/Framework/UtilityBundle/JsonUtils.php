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
        return [];
    }

    public static function parseArray($aArray)
    {
        return json_encode($aArray);
    }

    public static function parseObject($oObject)
    {
        if (!is_null($oObject)) {
            $aOutput = get_object_vars($oObject);
            return json_encode($aOutput);
        }
        return null;
    }

    public static function parseSuccess($aOthers = [])
    {
        $aResponse = ['result' => 'success'];
        if (!empty($aOthers)) {
            $aResponse = $aResponse + $aOthers;
        }
        
        return json_encode($aResponse);
    }

    public static function parseError($iErrorCode, $sErrorMsg)
    {
        $aError = [
            'error' => [
                'code' => $iErrorCode,
                'msg' => $sErrorMsg
            ]
        ];
        return json_encode($aError);
    }
}