<?php
namespace Siegelion\System;

use Siegelion\System\Core\Kernel;
use Siegelion\System\Core\Hook;

Hook::load('Siegelion\System\Hook\PreRuntimeKernel');

//Boot Kernel
$oKernel = new Kernel();
$oKernel->boot();

Hook::load('Siegelion\System\Hook\PostRuntimeKernel');