<?php

namespace DesignPatterns\Factory;

class Main
{
    public function __construct(Car $car)
    {
        $car->vroum();
    }
}
