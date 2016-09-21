<?php
namespace Siegelion\System\Core;

use Siegelion\System\Exception\ClassDoesNotExistException;
use Siegelion\System\Exception\MethodDoesNotExistException;

class Hook
{
    public static function load($sClass, $sNamespace = 'Siegelion\System')
    {
        try {
            $_sNamespace = $sNamespace.'\Hook\\'.$sClass;
            if (!class_exists($_sNamespace)) {
                throw new ClassDoesNotExistException($sClass);
            }
            $oHook = new $_sNamespace();
            
            if (!method_exists($oHook, 'run')) {
                throw new MethodDoesNotExistException('run');
            }
            $oHook->run();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}