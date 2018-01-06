<?php
namespace Siegelion\Service\Logistic;

interface FeeStrategyInterface
{
    public function createFee($iWeight);
}