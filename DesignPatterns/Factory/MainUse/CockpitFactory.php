<?php

namespace DesignPatterns\Factory\MainUse;

use DesignPatterns\Factory\Cockpit;

class CockpitFactory
{
    public function getInstance()
    {
        return new Cockpit();
    }
}
