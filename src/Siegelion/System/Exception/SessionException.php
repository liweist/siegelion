<?php
namespace Siegelion\System\Exception;

class SessionException extends \Exception
{
    public static function itemNotFound()
    {
        return new self('Session Item not found.');
    }

    public static function connectRedisError()
    {
        return new self('Redis cannot be connected.');
    }

    public static function redisNotInstalled()
    {
        return new self('Redis not installed.');
    }
}