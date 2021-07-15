<?php

namespace Solid\LiskovSubstitutionPrinciple\Shipping\Bad;

class Shipping
{
    public function calculateShippingCost($weightOfPackageKg, $destiny)
    {
        // Pre-condition:
        if ($weightOfPackageKg <= 0) {
            throw new \Exception('Package weight cannot be less than or equal to zero');
        }

        // We calculate the shipping cost by
        $shippingCost = rand(5, 15);

        // Post-condition
        if ($shippingCost <= 0) {
            throw new \Exception('Shipping price cannot be less than or equal to zero');
        }

        return $shippingCost;
    }
}
