<?php
namespace Siegelion\Application\MobilePortal\Action;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\ActionInterface;
use Siegelion\System\Framework\HttpBundle\Response;
use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Service\Business\CustomerManager;


class Home extends Action implements ActionInterface
{
    public function index()
    {
        $oCustomerManager = new CustomerManager();
        if ($oCustomerManager->hasSession()) {
            return $this->render('home.html');
        }

        $oSession = new Session('wxlogin');
        $oSession->set('redirecturl', '//m.couqiao.me');

        $oResponse = new Response();
        $oResponse->redirect('//api.couqiao.me/login');
    }
}