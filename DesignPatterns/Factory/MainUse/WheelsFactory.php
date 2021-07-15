<?php

namespace DesignPatterns\Factory\MainUse;

use DesignPatterns\Factory\Wheel;

class WheelsFactory
{
    public function getInstance()
    {
        $collection = [];

        for ($i = 0; $i <=3; $i++) {
            $collection[] = new Wheel();
        }

        return $collection;
    }
}
