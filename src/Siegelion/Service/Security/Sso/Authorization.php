<?php
namespace Siegelion\Service\Security\Sso;

use Siegelion\Storage\Presistence\DataManager;
use Siegelion\Storage\Presistence\Entity\User;

class Authorization
{
    public function isRegisteredUser()
    {
        //Use Database: User Entity
        // try {
        //     $oDataManager = DataManager::bind();
        //     $oUser = $oDataManager->getRepository('Siegelion\Storage\Presistence\Entity\User')->findOneByName('TestUser');
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        // }

        //Use Demo:
        $oUser  = new User();

        if ($oUser !== null) {
            return true;
        }
        return false;
    }
}
