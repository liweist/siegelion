<?php
namespace Siegelion\System\Core;

class ClassLoader
{
    public function loadClass($sClass)
    {
        $sFilepath = PATH_ROOT.'/../'.str_replace('\\', '/', $sClass).'.php';
        if (file_exists($sFilepath)) {
            require $sFilepath;
        }
    }

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'), true);
    }

    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }
}