<?php
namespace Siegelion\Service\Logistic;

use Siegelion\Service\Logistic\PriceGroup;
use Siegelion\Service\Logistic\FeeStrategy\DefaultFeeStrategy;

class LogisticFee
{
    private $sProvince;
    private $sCompany;

    public function __construct($sProvince, $sCompany = 'default')
    {
        $this->sProvince = $sProvince;
        $this->sCompany = $sCompany;
    }

    public function getFee($iWeight)
    {
        $oDefaultFeeStrategy = new DefaultFeeStrategy($this->sProvince, $this->sCompany);
        return $oDefaultFeeStrategy->createFee($iWeight);
    }
}