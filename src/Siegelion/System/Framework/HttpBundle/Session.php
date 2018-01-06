<?php
namespace Siegelion\System\Framework\HttpBundle;

use Siegelion\System\Framework\HttpBundle\SessionManager;
use Siegelion\System\Exception\SessionException;

class Session
{
    private $bStarted = false;
    private $sNamespace;

    public function __construct($sNamespace = 'token')
    {
        if (!$this->bStarted) {
            $this->start();
        }

        $this->sNamespace = $sNamespace;
    }

    public function get($sIndex)
    {
        if (!isset($_SESSION[$this->sNamespace][$sIndex])) {
            throw SessionException::itemNotFound();
        }

        return $_SESSION[$this->sNamespace][$sIndex];
    }

    public function set($sIndex, $xValue)
    {
        $_SESSION[$this->sNamespace][$sIndex] = $xValue;
    }

    public function has($sIndex)
    {
        return isset($_SESSION[$this->sNamespace][$sIndex]);
    }

    public function remove($sIndex)
    {
        unset($_SESSION[$this->sNamespace][$sIndex]);
    }

    public function clear()
    {
        $_SESSION[$this->sNamespace] = [];
    }

    public function all()
    {
        return $_SESSION[$this->sNamespace];
    }

    private function start()
    {
        if (PHP_SESSION_NONE === session_status()) {
            $oSessionManager = new SessionManager();
            $oSessionManager->start();
        }
        $this->bStarted = true;
    }
}