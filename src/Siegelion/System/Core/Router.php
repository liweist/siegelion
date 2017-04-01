<?php
namespace Siegelion\System\Core;

use Siegelion\System\Framework\UtilityBundle\ArrayUtils;

class Router
{
    public static $aRoutes = [];
    public static $aParams = [];

    public static function getRoutes()
    {
        return self::$aRoutes;
    }

    public static function getParams()
    {
        return self::$aParams;
    }

    public static function setAction($sUrl, $sName)
    {
        self::$aRoutes[$sUrl] = $sName;
    }

    public static function match($sUrl) {
        $sParamPattern = '/:.[^\\\]*/';
        $aUrlPath = explode('/', $sUrl);
        foreach (self::$aRoutes as $sRoute => $sAction) {
            $aPath = explode('/', $sRoute);
            $aFlipPathParams = array_flip(preg_grep('/:.+/', $aPath));
            foreach ($aFlipPathParams as $sParamName => $iRouteIndex) {
                self::$aParams[substr($sParamName, 1)] = $aUrlPath[$iRouteIndex];
            }

            $sReplacedRoute = str_replace('/', '\/', $sRoute);
            $sReplacedKey = preg_replace($sParamPattern, '.[^\/]*', $sReplacedRoute);
            if (preg_match('/^'.$sReplacedKey.'$/', $sUrl)) {
                return $sAction;
            }
        }
        return null;
    }
}
