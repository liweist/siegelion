<?php
namespace Siegelion\System\Core;

class Exception
{
    public function __construct()
    {
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        });
    }
}