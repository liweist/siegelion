<?php
namespace Siegelion\Storage\Presistence;

interface DaoInterface
{
    public function find();
    public function add();
    public function update();
    public function remove();
}