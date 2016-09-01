<?php
namespace System\Exception;

class FileDoesNotExistException extends \Exception
{
    public function __construct($sFileName)
    {
        parent::__construct('File "'.$sFileName.'" does not exist.');
    }
}