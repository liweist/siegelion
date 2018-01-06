<?php
namespace Siegelion\Service\Logistic;

use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use GuzzleHttp\Client;

class Traces
{
    private $sAppKey = 'be595bcd-9ebd-4ffb-95f9-c0a28b813ad3';
    private $aData;

    public function __construct($sCompany, $sTrackingnumber)
    {
        $sRequestData = JsonUtils::parseArray([
            'OrderCode' => '',
            'ShipperCode' => $sCompany,
            'LogisticCode' => $sTrackingnumber
        ]);

        $this->aData = [
            'EBusinessID' => '1288767',
            'RequestType' => '1002',
            'RequestData' => urlencode($sRequestData),
            'DataType' => '2',
            'DataSign' => urlencode($this->encrypt($sRequestData, $this->sAppKey))
        ];
    }

    private function encrypt($sData, $sAppKey)
    {
        return base64_encode(md5($sData.$sAppKey));
    }

    public function getTracesData()
    {
        $oClient = new Client();
        $sResponse = $oClient->request('POST', 'http://api.kdniao.cc/Ebusiness/EbusinessOrderHandle.aspx', ['form_params' => $this->aData])
                             ->getBody();
        return JsonUtils::toArray($sResponse);
    }
}