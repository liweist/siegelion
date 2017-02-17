<?php
namespace Siegelion\Service\Security\Sso;

use Siegelion\Storage\Presistence\DataManager;
use Siegelion\Storage\Presistence\Entity\User;

class UserAccessControl
{
    public function isAdmin()
    {
        try {
            $oDataManager = DataManager::bind();
            $oUser = $oDataManager->getRepository('Siegelion\Storage\Presistence\Entity\User')->findOneByName('TestUser');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        if ($oUser->getAccess() === 'admin') {
            return true;
        }
        return false;
    }
}