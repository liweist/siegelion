<?php
namespace System\Hook;

use System\Framework\BaseBundle\AbstrackHook;
use System\Core\Exception;

class PreRuntimeKernel extends AbstrackHook 
{
    public function initQueue()
    {
        return array(
            new Exception()
        );
    }
}