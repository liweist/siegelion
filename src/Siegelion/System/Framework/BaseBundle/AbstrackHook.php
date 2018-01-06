<?php
namespace Siegelion\System\Framework\BaseBundle;

abstract class AbstrackHook
{
    public $aQueue = [];

    public abstract function initQueue();

    public function run()
    {
        $this->aQueue = $this->initQueue();
    }
}