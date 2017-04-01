<?php
namespace Siegelion;

define('VERSION', '3.1.1');

define('PATH_ROOT', __DIR__.'/');

define('PATH_SYS', PATH_ROOT.'System/');
define('PATH_STO', PATH_ROOT.'Storage/');
define('PATH_SEV', PATH_ROOT.'Service/');
define('PATH_APP', PATH_ROOT.'Application/');

define('PATH_CONF', PATH_ROOT.'config.json');

require PATH_SYS.'Runtime.php';
