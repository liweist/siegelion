<?php
namespace Siegelion\System\Core;

use Siegelion\System\Exception\SystemException;

class Hook
{
    public static function load($sClass)
    {
        try {
            if (!class_exists($sClass)) {
                throw SystemException::classNotExist($sClass, __NAMESPACE__);
            }
            $oHook = new $sClass();
            
            if (!method_exists($oHook, 'run')) {
                throw SystemException::methodNotExist('run', __NAMESPACE__);
            }
            $oHook->run();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}