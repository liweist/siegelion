<?php
namespace Siegelion\Service\Logistic\FeeStrategy;

use Siegelion\Service\Logistic\FeeStrategyInterface;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;

class DefaultFeeStrategy implements FeeStrategyInterface
{
    private $iBasePrice;
    private $iUnitPrice;
    private $iBaseWeight;

    public function __construct($sProvince, $sCompany)
    {
        if (!file_exists(PATH_SEV.'Logistic/PriceGroups/'.$sCompany.'.json')) {
            $sCompany = 'default';
        }
        $aPriceGroup = JsonUtils::loadJson(PATH_SEV.'Logistic/PriceGroups/'.$sCompany.'.json');
        foreach ($aPriceGroup['ranges'] as $sGroupIndex => $aProvinces) {
            if (in_array($sProvince, $aProvinces)) {
                $this->iBaseWeight = $aPriceGroup['groups'][$sGroupIndex]['baseWeight'];
                $this->iBasePrice = $aPriceGroup['groups'][$sGroupIndex]['basePrice'];
                $this->iUnitPrice = $aPriceGroup['groups'][$sGroupIndex]['unitPrice'];
            }
        }
    }

    public function createFee($iWeight)
    { 
        if ($iWeight > $this->iBaseWeight) {
            return $this->iBasePrice + ceil(($iWeight - $this->iBaseWeight) / 1000.0) * $this->iUnitPrice;
        }
        return $this->iBasePrice;
    }
}