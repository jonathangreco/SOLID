<?php

namespace Solid\OpenClosedPrinciple\Payment;

use Solid\OpenClosedPrinciple\Payment\Bad\Payment;
use Solid\OpenClosedPrinciple\Payment\Good\PaymentFactory;

class Build
{
    public function payBad($type)
    {
        $payment = new Payment();
        $value = "paid with unknown";

        switch($type) {
            case "CB":
                $value = $payment->payWithCreditCard();
                break;
            case "Paypal":
                $value = $payment->payWithPaypal();
                break;
        }

        return $value;
    }

    public function payGood($type)
    {
        $instance = (new PaymentFactory())->init($type);
        return $instance->pay();
    }
}
