<?php
namespace Siegelion\Storage\Presistence;

class Query
{
    protected $oConnection = null;

    public function __construct($oConnection)
    {
        $this->oConnection = $oConnection;
    }

    public function insert($sTable, $aParams)
    {
        $aKeys = implode(', ', array_keys($aParams));
        $sPlaceholder = substr(str_repeat('?, ', count($aKeys)), 0, -1);
        $sSql = 'INSERT INTO '.$sTable.' ('.$keys.') VALUES ('.$sPlaceholder.')';
        try {
            $this->oConnection->beginTransaction();
            $oStatement = $this->oConnection->prepare($sSql);
            $oStatement->execute(array_values($aParams));
            $this->oConnection->commit();
        } catch (\PDOException $e) {
            $this->oConnection->rollBack();
        }
    }
}