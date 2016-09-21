<?php
namespace Siegelion\Application\Www\Delegate;

use Siegelion\System\Framework\BaseBundle\Delegate;
use Siegelion\System\Framework\BaseBundle\DelegateInterface;

class Login extends Delegate implements DelegateInterface
{
    public function showPage()
    {
        return $this->render('home.html', array(
            'title' => 'Login'
        ));
    }
}