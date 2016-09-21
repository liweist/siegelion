<?php
namespace Siegelion\Storage\Presistence;

use Siegelion\Storage\Presistence\Exception\DBConnectionException;

class Connection
{
    protected $aConfig;
    protected $oConnect = null;

    public function __construct($aConfig = array()) {
        $this->aConfig = $aConfig;
    }

    public function bind() {
        $sDsn = $this->aConfig['dbType']
            .':host='.$this->aConfig['host']
            .';dbname='.$this->aConfig['dbName']
            .';port='.isset($this->aConfig['port']) ? $this->aConfig['port'] : '3306';
        try {
            $this->oConnect = new \PDO($sDsn, $this->aConfig['user'], $this->aConfig['pass']);
            $this->oConnect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            new DBConnectionException($e);
        }
    }
}