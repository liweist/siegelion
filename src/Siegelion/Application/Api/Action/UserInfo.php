<?php
namespace Siegelion\Application\Api\Action;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\RestfulActionInterface;

class UserInfo extends Action implements RestfulActionInterface
{
    public function get($aParams, $aQuery)
    {
        //echo '[GET] /users/'.$aParams["id"].'?sort='.$aQuery['sort'];
        echo '[GET] /user/'.$aParams["id"];
    }

    public function post($aParams, $aQuery, $aRequest)
    {
        echo '[POST] /user/'.$aParams["id"];
        var_dump($aRequest); //json
    }

    public function put($aParams, $aQuery, $aRequest)
    {
        echo '[PUT] /user/'.$aParams["id"];
        var_dump($aRequest); //json
    }

    public function patch($aParams, $aQuery, $aRequest)
    {
        echo '[PATCH] /user/'.$aParams["id"];
        var_dump($aRequest); //json
    }

    public function delete($aParams, $aQuery, $aRequest)
    {
        echo '[DELETE] /user/'.$aParams["id"];
        var_dump($aRequest); //json
    }
}
