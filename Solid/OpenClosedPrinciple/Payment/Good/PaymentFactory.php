<?php

namespace Solid\OpenClosedPrinciple\Payment\Good;

class PaymentFactory
{
    public function init(string $type): PayableInterface
    {
        switch ($type) {
            case 'CB':
                return new CreditCardPayment();
            case 'Paypal':
                return new PayPalPayment();
            default:
                throw new \Exception("Payment method not supported");
        }
    }
}
