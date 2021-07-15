<?php

namespace DesignPatterns\Factory\MainUse;

use DesignPatterns\Factory\Trunk;

class TrunkFactory
{
    public function getInstance()
    {
        return new Trunk();
    }
}
