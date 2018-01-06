<?php
namespace Siegelion\System\Framework\BaseBundle;

use Siegelion\System\Framework\UtilityBundle\StringUtils;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Siegelion\System\Exception\ApplicationException;

class Action
{
    public $sAppName;
    public $sViewTheme;
    public $sViewBaseHtml;

    public function __construct($sAppName, $aViewOptions = [])
    {
        $this->sAppName = $sAppName;

        if (isset($aViewOptions['theme'])) {
            $this->sViewTheme = $aViewOptions['theme'];
        }
        if (isset($aViewOptions['baseHtml'])) {
            $this->sViewBaseHtml = $aViewOptions['baseHtml'];
        }
    }

    public function render($sViewPage, $aReplaces = [], $sViewBaseHtml = '')
    {
        if (!empty($sViewBaseHtml)) {
            $this->sViewBaseHtml = $sViewBaseHtml;
        }

        $sFilepathDir = PATH_APP.$this->sAppName.'/View/';
        $sFilepathBaseHtml = $sFilepathDir.$this->sViewBaseHtml;
        if (!is_null($this->sViewBaseHtml) && !file_exists($sFilepathBaseHtml)) {
            throw ApplicationException::viewBaseNotExist($sFilepathBaseHtml);
        }
        $sFilepathViewPage = $sFilepathDir.$this->sViewTheme.'/'.$sViewPage;
        if (!file_exists($sFilepathViewPage)) {
            throw ApplicationException::viewPageNotExist($sFilepathViewPage);
        }
        $sViewPageHtml = StringUtils::templateReplace($sFilepathViewPage, $aReplaces);
        
        $aConfig = JsonUtils::loadJson(PATH_CONF);
        if (!is_null($this->sViewBaseHtml)) {
            return StringUtils::templateReplace($sFilepathBaseHtml, array(
                '%body%' => $sViewPageHtml
            ));
        } else {
            return $sViewPageHtml;
        }
    }

    public function renderHtml($sViewPage, $aReplaces = [])
    {
        $sFilepathDir = PATH_APP.$this->sAppName.'/View/';
        $sFilepathViewPage = $sFilepathDir.'/'.$sViewPage;
        if (!file_exists($sFilepathViewPage)) {
            throw ApplicationException::viewPageNotExist($sFilepathViewPage);
        }
        $sViewPageHtml = StringUtils::templateReplace($sFilepathViewPage, $aReplaces);
        return $sViewPageHtml;
    }
}