<?php
namespace Siegelion\System\Hook;

use Siegelion\System\Framework\BaseBundle\AbstrackHook;
use Siegelion\System\Core\Exception;
use Siegelion\System\Core\Location;
use Siegelion\System\Core\Cache;

class PreRuntimeKernel extends AbstrackHook 
{
    public function initQueue()
    {
        return array(
            new Exception(),
            new Location()
        );
    }
}