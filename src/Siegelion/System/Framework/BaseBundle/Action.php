<?php
namespace Siegelion\System\Framework\BaseBundle;

use Siegelion\System\Framework\UtilityBundle\StringUtils;
use Siegelion\System\Exception\SystemException;

class Action
{
    public $sAppName;
    public $sViewTheme;
    public $sViewBaseHtml;

    public function __construct($sAppName, $aViewOptions)
    {
        $this->sAppName = $sAppName;

        if (isset($aViewOptions['theme'])) {
            $this->sViewTheme = $aViewOptions['theme'];
        }
        if (isset($aViewOptions['baseHtml'])) {
            $this->sViewBaseHtml = $aViewOptions['baseHtml'];
        }
    }

    public function render($sViewPage, $aReplaces = array(), $sViewBaseHtml = '')
    {
        if (!empty($sViewBaseHtml)) {
            $this->sViewBaseHtml = $sViewBaseHtml;
        }
        try {
            $sFilepathDir = PATH_APP.$this->sAppName.'/View/';
            $sFilepathBaseHtml = $sFilepathDir.$this->sViewBaseHtml;
            $sFilepathViewPage = $sFilepathDir.$this->sViewTheme.'/'.$sViewPage;

            $sViewPageHtml = StringUtils::templateReplace($sFilepathViewPage, $aReplaces);
            if (null !== $this->sViewBaseHtml) {
                return StringUtils::templateReplace($sFilepathBaseHtml, array(
                    '%body%' => $sViewPageHtml
                ));
            } else {
                return $sViewPageHtml;
            }
        } catch (\Exception $e) {
            throw SystemException::fileNotExist($sFilepathBaseHtml || $sFilepathViewPage, __NAMESPACE__);
        }
    }
}