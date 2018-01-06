<?php
namespace Siegelion\Storage\Persistence;

abstract class DataManagerAbstract
{
    protected $oDataManager;

    abstract public function get();
    abstract public function has();

    protected function init()
    {
        $this->oDataManager = DataManager::bind();
    }

    protected function manage($sEntity, $iPrimaryId)
    {
        return $this->oDataManager->find($sEntity, $iPrimaryId);
    }

    protected function commit()
    {
        $this->oDataManager->flush();
    }
}