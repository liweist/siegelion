<?php
namespace Siegelion\Application\Api;

use Siegelion\System\Framework\BaseBundle\AppKernel;
use Siegelion\System\Framework\BaseBundle\AppInterface;
use Siegelion\System\Core\Router;
use Siegelion\Service\Security\Sso\Authorization;
use Siegelion\Service\Security\Sso\UserAccessControl;

class App extends AppKernel implements AppInterface
{
    public function run()
    {
        Router::setAction('/users', 'UserList');
        Router::setAction('/user/:id', 'UserInfo');
    }
}
