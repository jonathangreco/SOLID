<?php

namespace Solid\OpenClosedPrinciple\Payment\Bad;

class Payment
{
    public function payWithCreditCard()
    {
        return 'paid with CB';
    }

    public function payWithPaypal()
    {
        return 'paid with paypal';
    }
}
