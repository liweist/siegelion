<?php
namespace Siegelion\Storage\Presistence;

class Entry
{
    public $aAttributes;

    public function __construct($aAttributes = array())
    {
        $this->aAttributes = $aAttributes;
    }

    public function has($sName)
    {
        return isset($this->aAttributes[$sName]);
    }
    
    public function get($sName)
    {
        if (isset($this->aAttributes[$sName])) {
            return $this->aAttributes[$sName];
        }
        return null;
    }

    public function set($sName, $oVaule)
    {
        $this->aAttributes[$sName] = $oVaule;
    }

    public function remove($sName) {
        unset($this->aAttributes[$sName]);
    }
}