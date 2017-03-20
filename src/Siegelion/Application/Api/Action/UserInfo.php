<?php
namespace Siegelion\Application\Api\Action;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;

class UserInfo extends Action implements RestfulActionInterface
{   
    public function get($aUri, $aParams, $aBody)
    {
        echo '[GET] /users/'.$aUri["users"].'?sort='.$aParams['sort'];
    }

    public function getPic($aUri, $aParams, $aBody)
    {
        echo '[GET] /users/'.$aUri["users"].'/pic/'.$aUri["pic"];
    }

    public function post($aUri, $aParams, $aBody)
    {
        echo '[POST] /users/'.$aUri["users"];
        var_dump($aBody); //json
    }

    public function put($aUri, $aParams, $aBody)
    {
        echo '[PUT] /users/'.$aUri["users"];
        var_dump($aBody); //json
    }

    public function patch($aUri, $aParams, $aBody)
    {
        echo '[PATCH] /users/'.$aUri["users"];
        var_dump($aBody); //json
    }

    public function delete($aUri, $aParams, $aBody)
    {
        echo '[DELETE] /users/'.$aUri["users"];
        var_dump($aBody); //json
    }
}