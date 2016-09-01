<?php
namespace Application\Www\Delegate;

use System\Framework\BaseBundle\Delegate;
use System\Framework\BaseBundle\DelegateInterface;

class Home extends Delegate implements DelegateInterface
{
    public function showPage()
    {
        return $this->render('home.html', array(
            'title' => 'Hello!!'
        ));
    }
}