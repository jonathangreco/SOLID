<?php

return [
    DesignPatterns\Factory\Main::class => DI\create()->constructor(DI\get("Car")),
    "Car" => DI\factory('DesignPatterns\Factory\MainUse\CarFactory::init'),
    "Wheels" => DI\factory('DesignPatterns\Factory\MainUse\WheelsFactory::getInstance'),
    "Cockpit" => DI\factory('DesignPatterns\Factory\MainUse\CockpitFactory::getInstance'),
    "Trunk" => DI\factory('DesignPatterns\Factory\MainUse\TrunkFactory::getInstance'),
];
