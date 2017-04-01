<?php
namespace Siegelion\Application\Api\Action;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;

class UserList extends Action implements RestfulActionInterface
{
    public function get($aParams, $aQuery)
    {
        //echo '[GET] /users?sort='.$aQuery['sort'];
        echo '[GET] /users';
    }

    public function post($aParams, $aQuery, $aRequest)
    {
        echo '[POST] /users';
        var_dump($aRequest); //json
    }

    public function put($aParams, $aQuery, $aRequest)
    {
        echo '[PUT] /users';
        var_dump($aRequest); //json
    }

    public function patch($aParams, $aQuery, $aRequest)
    {
        echo '[PATCH] /users';
        var_dump($aRequest); //json
    }

    public function delete($aParams, $aQuery, $aRequest)
    {
        echo '[DELETE] /users';
        var_dump($aRequest); //json
    }
}
