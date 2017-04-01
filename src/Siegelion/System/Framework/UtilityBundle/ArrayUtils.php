<?php
namespace Siegelion\System\Framework\UtilityBundle;

class ArrayUtils
{
    public static function pregArrayIndex($sPattern, $aInput)
    {
        return array_flip(preg_grep($sPattern, array_flip($aInput)));
    }
}