<?php
namespace Siegelion\System\Hook;

use Siegelion\System\Framework\BaseBundle\AbstrackHook;
use Siegelion\System\Core\Exception;

class PreRuntimeKernel extends AbstrackHook 
{
    public function initQueue()
    {
        return array(
            new Exception()
        );
    }
}