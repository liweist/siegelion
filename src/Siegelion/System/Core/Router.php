<?php
namespace Siegelion\System\Core;

class Router
{
    public static $routes = array();

    public static function setAction($sUrl, $sName)
    {
        self::$routes[$sUrl] = $sName;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}