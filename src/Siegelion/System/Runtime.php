<?php
namespace Siegelion\System;

use Siegelion\System\Core\ClassLoader;
use Siegelion\System\Core\Kernel;
use Siegelion\System\Core\Hook;

//Autoload
require PATH_SYS.'Core/ClassLoader.php';
$oClassLoader = new ClassLoader();
$oClassLoader->register();

Hook::load('PreRuntimeKernel');

//Boot Kernel
$oKernel = new Kernel();
$oKernel->boot();

Hook::load('PostRuntimeKernel');