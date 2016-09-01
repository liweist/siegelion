<?php
namespace Application\Www;

use System\Framework\BaseBundle\AppKernel;
use System\Framework\BaseBundle\AppInterface;
use System\Core\Router;
use System\Core\Service;
use Service\Security\Sso\Authorization;
use Service\Security\Sso\UserAccessControl;

class App extends AppKernel implements AppInterface
{
    public function run()
    {
        $oAuth = new Authorization();
        $oUserAccessControl = new UserAccessControl();
        if ($oAuth->isRegisteredUser()) {
            if ($oUserAccessControl->isAdmin()) {
                Router::setDelegate('/', 'homeAdmin');
            }
            Router::setDelegate('/', 'home');
        } else {
            Router::setDelegate('/', 'login');
        }
    }
}