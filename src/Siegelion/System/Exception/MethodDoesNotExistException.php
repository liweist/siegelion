<?php
namespace Siegelion\System\Exception;

class MethodDoesNotExistException extends \Exception
{
    public function __construct($sMethod)
    {
        parent::__construct('Method "'.$sMethod.'" does not exist.');
    }
}