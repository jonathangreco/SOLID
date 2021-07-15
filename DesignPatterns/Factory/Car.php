<?php

namespace DesignPatterns\Factory;

use DesignPatterns\Factory\MainUse\CarFactory;

class Car
{
    /**
     * @var array
     */
    private $wheels;

    /**
     * @var Cockpit
     */
    private $cockpit;

    /**
     * @var Trunk
     */
    private $trunk;

    public function __invoke()
    {
        return new CarFactory();
    }

    public function __construct(array $wheels, Cockpit $cockpit, Trunk $trunk)
    {
        $this->wheels = $wheels;
        $this->cockpit = $cockpit;
        $this->trunk = $trunk;
    }

    public function vroum()
    {
        var_dump($this);
    }
}
