<?php
namespace Siegelion\System\Framework\HttpBundle;

use Siegelion\System\Exception\SessionException;

class SessionManager implements \SessionHandlerInterface
{
    private $oRedis;
    private $iSessionExpireTime = 7200;
    private $sPrefix = 'SESSION_';

    public function __construct()
    {
        ini_set('session.name', 'couqiao');
        ini_set('session.cookie_path', '/');
        ini_set('session.cookie_domain', '.couqiao.me');

        if (!class_exists('redis', false)) {
            throw SessionException::redisNotInstalled();
        }

        try {
            $this->oRedis = new \Redis();
            $this->oRedis->connect('127.0.0.1', 6379);
            session_set_save_handler($this);
        } catch (\RedisException $e) {
            throw \SessionException::connectRedisError();
        }
    }

    public function start()
    {
        session_start();
    }

    public function open($sPath, $sSessionName)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($sSessionId)
    {
        $sData = $this->oRedis->get($this->sPrefix.$sSessionId);
        $xData = unserialize($sData);
        if ($xData) {
            return $xData;
        }
        return '';
    }

    public function write($sSessionId, $xData)
    {
        $sData = serialize($xData);
        if ($this->oRedis->set($this->sPrefix.$sSessionId, $sData)) {
            $this->oRedis->expire($this->sPrefix.$sSessionId, $this->iSessionExpireTime);
            return true;
        }
        return false;
    }

    public function destroy($sSessionId)
    {
        if ($this->oRedis->delete($this->sPrefix.$sSessionId)) {
            return true;
        }
        return false;
    }

    public function gc($iMaxLifeTime)
    {
        return true;
    }

    public function __destruct() {
        session_write_close();
    }
}