<?php
namespace Siegelion\Application\Portal;

use Siegelion\System\Framework\BaseBundle\AppKernel;
use Siegelion\System\Framework\BaseBundle\AppInterface;
use Siegelion\System\Core\Router;
use Siegelion\Service\Security\Sso\Authorization;
use Siegelion\Service\Security\Sso\UserAccessControl;

class App extends AppKernel implements AppInterface
{
    public function run()
    {
        $oAuth = new Authorization();
        $oUserAccessControl = new UserAccessControl();
        if ($oAuth->isRegisteredUser()) {
            Router::setAction('/', 'Home');
            if ($oUserAccessControl->isAdmin()) {
                Router::setAction('/', 'HomeAdmin');
            }
        } else {
            Router::setAction('/', 'Login');
        }
        Router::setAction('/news', 'Products\ProductNews');
    }
}