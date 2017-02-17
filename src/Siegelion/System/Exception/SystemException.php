<?php
namespace Siegelion\System\Exception;

class SystemException extends \Exception
{
    public static function classNotExist($sClass, $sNamespaces)
    {
        return new self('Class "'.$sClass.'" does not exist in '.$sNamespaces.'.');
    }

    public static function fileNotExist($sFileName, $sNamespaces)
    {
        return new self('File "'.$sFileName.'" does not exist in '.$sNamespaces.'.');
    }

    public static function methodNotExist($sMethod, $sNamespaces)
    {
        return new self('Method "'.$sMethod.'" does not exist in '.$sNamespaces.'.');
    }
}