<?php
namespace Siegelion\Storage\Presistence;

use Siegelion\Storage\Presistence\Exception\DBConnectionException;
use Siegelion\System\Framework\UtilityBundle\JsonUtils;
use Doctrine\DBAL\DriverManager;

class Connection
{
    protected static $oConnect = null;

    public static function bind() {
        try {
            $this->aConfig = JsonUtils::loadJson(PATH_CONF);
            return DriverManager::getConnection($this->aConfig['database']);
        } catch (\PDOException $e) {
            throw DBConnectionException($e);
        }
    }
}