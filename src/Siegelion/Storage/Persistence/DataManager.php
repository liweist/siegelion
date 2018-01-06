<?php
namespace Siegelion\Storage\Persistence;

use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DataManager
{
    protected static $oManager = null;

    public static function bind()
    {
        if (self::$oManager !== null) {
            return self::$oManager;
        }

        $oEntityConfig = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Entity"));
        $aConfig = JsonUtils::loadJson(PATH_CONF);
        self::$oManager = EntityManager::create($aConfig['database']['mysql'], $oEntityConfig);
        return self::$oManager;
    }
}