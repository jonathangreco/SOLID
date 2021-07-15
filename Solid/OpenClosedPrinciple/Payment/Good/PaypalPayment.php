<?php

namespace Solid\OpenClosedPrinciple\Payment\Good;

class PaypalPayment implements PayableInterface
{

    public function pay()
    {
        return 'Paid By Paypal';
    }
}
