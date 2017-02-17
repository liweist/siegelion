<?php
namespace Siegelion\Application\Portal\Action\Products;

use Siegelion\System\Framework\BaseBundle\Action;
use Siegelion\System\Framework\BaseBundle\ActionInterface;

class ProductNews extends Action implements ActionInterface
{
    public function index()
    {
        return $this->render('home.html', array(
            'title' => 'ProductNews'
        ));
    }
}