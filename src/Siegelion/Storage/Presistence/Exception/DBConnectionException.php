<?php
namespace Siegelion\System\Exception;

class DBConnectionException extends \Exception
{
    public function __construct($oError)
    {
        parent::__construct('Database Connection error('.$oError->getMessage().').');
    }
}