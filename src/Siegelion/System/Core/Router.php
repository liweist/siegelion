<?php
namespace Siegelion\System\Core;

class Router
{
    public static $aRoutes = array();

    public static function getRoutes()
    {
        return self::$aRoutes;
    }

    public static function setAction($sUrl, $sName)
    {
        self::$aRoutes[$sUrl] = $sName;
    }
}