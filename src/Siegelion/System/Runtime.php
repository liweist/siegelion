<?php
namespace System;

use System\Core\ClassLoader;
use System\Core\Kernel;
use System\Core\Hook;

//Autoload
require PATH_SYS.'Core/ClassLoader.php';
$oClassLoader = new ClassLoader();
$oClassLoader->register();

Hook::load('PreRuntimeKernel');

//Boot Kernel
$oKernel = new Kernel();
$oKernel->boot();

Hook::load('PostRuntimeKernel');