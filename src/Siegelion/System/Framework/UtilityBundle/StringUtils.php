<?php
namespace Siegelion\System\Framework\UtilityBundle;

use Siegelion\System\Exception\FileDoesNotExistException;

class StringUtils 
{
    public static function ucfirstStrings($aString) 
    {
        return $aResult = array_map(function ($sString) {
            return ucfirst($sString);
        }, $aString);
    }

    public static function fileToString($sFilename)
    {
        $sFile = '';

        if (file_exists($sFilename)) {
            $sFile = file_get_contents($sFilename);
        } else {
            throw new FileDoesNotExistException($sFilename);
        }

        return $sFile;
    }

    /**
     * This function is for read template file to string variable,
     * replace function as an option
     *
     * @param string $filename Ffilename
     * @param string[] $replaces Array of replace strings
     * @param string $replaceBeginSign Begin sign for replacement
     * @param string $replaceEndSign End sign for replacement
     * 
     * @throws System\Exception\FileDoesNotExistException
     * @return string File string
     */
    public static function templateReplace($sFilename, $aReplaces = array(), $sReplaceBeginSign = '{', $sReplaceEndSign = '}') 
    {
        $sFile = '';

        if (file_exists($sFilename)) {
            $sFile = file_get_contents($sFilename);

            if (is_array($aReplaces) && !empty($aReplaces)) {
                $aPatterns = array();
                $aReplacements = array();

                foreach ($aReplaces as $sKey => $sValue) {
                    $aPatterns[] = '/'.$sReplaceBeginSign.$sKey.$sReplaceEndSign .'/';
                    $aReplacements[] = $sValue;
                }

                $sFile = preg_replace($aPatterns, $aReplacements, $sFile);
            }
        } else {
            throw new FileDoesNotExistException($sFilename);
        }

        return $sFile;
    }
}