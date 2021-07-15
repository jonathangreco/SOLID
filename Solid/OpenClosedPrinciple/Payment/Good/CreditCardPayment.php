<?php

namespace Solid\OpenClosedPrinciple\Payment\Good;

class CreditCardPayment implements PayableInterface
{

    public function pay()
    {
        return "paid by CB";
    }
}
