<?php
namespace Siegelion\Service\Business;

use Siegelion\System\Framework\HttpBundle\Session;
use Siegelion\Storage\Persistence\DataManagerAbstract;
use Siegelion\Storage\Persistence\Entity\Logistic;
use Siegelion\Storage\Persistence\Entity\Order;

class LogisticManager extends DataManagerAbstract
{
    const DEPART = 0;
    const ARRIVE = 1;
    const TRANSPORT = 2;

    private $oLogistic;

    public function __construct($iLogisticid = null)
    {
        $this->init();
        if (!is_null($iLogisticid)) {
            $this->oLogistic = $this->manage(Logistic::class, $iLogisticid);
        }
    }

    public function create(Order $oOrder)
    {
        $this->oLogistic = new Logistic();
        $this->oLogistic->setOrderid($oOrder->getOrderid())
                        ->setStatus(self::DEPART)
                        ->setCreatedat(new \DateTime());
        $this->oDataManager->persist($this->oLogistic);
        $this->commit();

        return $this->oLogistic;
    }

    public function startTransport($sCompany, $sCompanycode, $sType, $sTrackingnumber)
    {
        $this->oLogistic->setCompany($sCompany)
                        ->setCompanycode($sCompanycode)
                        ->setType($sType)
                        ->setTrackingnumber($sTrackingnumber)
                        ->setStatus(self::TRANSPORT);
        $this->commit();
    }

    public function endTransport()
    {
        $this->oLogistic->setStatus(self::ARRIVE);
        $this->commit();
    }

    public function has()
    {
        if (is_null($this->oLogistic)) {
            return false;
        }
        return true;
    }

    public function get()
    {
        return $this->oLogistic;
    }

    public function getByOrderid()
    {
        
    }
}