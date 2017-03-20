<?php
namespace Siegelion\System\Exception;

class ApplicationException extends \Exception
{
    public static function appNotExist($sApp)
    {
        return new self('App "'.$sApp.'" does not exist.');
    }

    public static function actionNotExist($sAction)
    {
        return new self('Action "'.$sAction.'" does not exist.');
    }

    public static function actionRequired()
    {
        return new self('Action must be required.');
    }

    public static function viewPageNotExist($sView)
    {
        return new self('View Page "'.$sView.'" does not exist.');
    }

    public static function viewBaseNotExist($sViewBase)
    {
        return new self('View Base "'.$sViewBase.'" does not exist.');
    }

    public static function callbackNotExist($sObjectName, $sCallback)
    {
        return new self('Callback Function "'.$sObjectName.'::'.$sCallback.'" does not exist.');
    }
}