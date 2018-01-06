<?php
namespace Siegelion\Application\Portal\Action;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\ActionInterface;

class Home extends Action implements ActionInterface
{
    public function index()
    {
        return $this->render('home.html', array(
            'tip' => 'Please view this page in Weixin browser！'
        ));
    }
}