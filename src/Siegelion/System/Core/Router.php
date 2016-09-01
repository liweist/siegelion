<?php
namespace System\Core;

class Router
{
    public static $routes = array();

    public static function setDelegate($sUrl, $sName)
    {
        self::$routes[$sUrl] = $sName;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }
}