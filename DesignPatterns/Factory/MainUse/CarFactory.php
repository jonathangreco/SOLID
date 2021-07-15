<?php

namespace DesignPatterns\Factory\MainUse;

use DesignPatterns\Factory\Car;
use DI\Container;

class CarFactory
{
    public function init(Container $container)
    {
        $wheelFactory = $container->get('Wheels');
        $cockpitFactory = $container->get('Cockpit');
        $trunkFactory = $container->get('Trunk');

        return new Car($wheelFactory, $cockpitFactory, $trunkFactory);
    }
}
