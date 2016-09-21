<?php
namespace Siegelion\Application\Www;

use Siegelion\System\Framework\BaseBundle\AppKernel;
use Siegelion\System\Framework\BaseBundle\AppInterface;
use Siegelion\System\Core\Router;
use Siegelion\System\Core\Service;
use Siegelion\Service\Security\Sso\Authorization;
use Siegelion\Service\Security\Sso\UserAccessControl;

class App extends AppKernel implements AppInterface
{
    public function run()
    {
        $oAuth = new Authorization();
        $oUserAccessControl = new UserAccessControl();
        if ($oAuth->isRegisteredUser()) {
            Router::setDelegate('/', 'home');
            if ($oUserAccessControl->isAdmin()) {
                Router::setDelegate('/', 'homeAdmin');
            }
        } else {
            Router::setDelegate('/', 'login');
        }
    }
}