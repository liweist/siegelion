<?php
namespace Siegelion\Application\Portal\Action;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\ActionInterface;

class Login extends Action implements ActionInterface
{
    public function index()
    {
        return $this->render('home.html', array(
            'title' => 'Login'
        ));
    }
}