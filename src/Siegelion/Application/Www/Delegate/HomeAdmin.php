<?php
namespace Siegelion\Application\Www\Delegate;

use Siegelion\System\Framework\BaseBundle\Delegate;
use Siegelion\System\Framework\BaseBundle\DelegateInterface;

class HomeAdmin extends Delegate implements DelegateInterface
{
    public function showPage()
    {
        return $this->render('home.html', array(
            'title' => 'Admin'
        ));
    }
}