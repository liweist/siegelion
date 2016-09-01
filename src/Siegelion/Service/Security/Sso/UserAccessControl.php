<?php
namespace Service\Security\Sso;

class UserAccessControl
{
    public function isAdmin()
    {
        return false;
    }
}