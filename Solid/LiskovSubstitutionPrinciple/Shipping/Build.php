<?php

namespace Solid\LiskovSubstitutionPrinciple;

use Solid\BuildableInterface;
use Solid\LiskovSubstitutionPrinciple\Shipping\Bad\WorldWideShipping;

class Build implements BuildableInterface
{

    public function bad($param)
    {
        $www = (new WorldWideShipping())->calculateShippingCost('3.13', null);


    }

    public function good($param)
    {
        // TODO: Implement good() method.
    }
}
