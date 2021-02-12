<?php

namespace Solid\SingleResponsability\TellDontAsk\Good;

use Solid\SingleResponsability\TellDontAsk\NotEnoughFundsException;
use Solid\SingleResponsability\TellDontAsk\User;

class InvoiceController
{
    public function payAction()
    {
        $user = new User();
        $invoice = 150; // Should be an object ? Yes
        try {
            $user->payInvoice($invoice);
        } catch (NotEnoughFundsException $e) {
            // ...
        }
        // ...
    }
}
