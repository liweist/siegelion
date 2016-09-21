<?php
namespace Siegelion\System\Exception;

class ClassDoesNotExistException extends \Exception
{
    public function __construct($sClass)
    {
        parent::__construct('Class "'.$sClass.'" does not exist.');
    }
}