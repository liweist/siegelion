<?php
namespace Siegelion\Application\Portal;

use Siegelion\System\Framework\BaseBundle\AppKernel;
use Siegelion\System\Framework\BaseBundle\AppInterface;
use Siegelion\System\Framework\HttpBundle\Response;
use Detection\MobileDetect;

class App extends AppKernel implements AppInterface
{
    public function run()
    {
        $mobileDetect = new MobileDetect();
        if ($mobileDetect->isMobile()) {
            $response = new Response();
            $response->redirect('//m.couqiao.me');
        }
    }
}