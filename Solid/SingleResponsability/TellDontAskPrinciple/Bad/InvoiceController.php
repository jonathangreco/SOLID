<?php

namespace Solid\SingleResponsability\TellDontAsk\Bad;

use Solid\SingleResponsability\TellDontAsk\NotEnoughFundsException;
use Solid\SingleResponsability\TellDontAsk\User;

class InvoiceController
{
    public function payAction()
    {
        $invoiceTotal = 150;
        $user = new User();
        $userBalance = $user->getBalance();

        if ($userBalance < $invoiceTotal) {
            throw new NotEnoughFundsException();
        }

        $newBalance = $userBalance - $invoiceTotal;
        $user->setBalance($newBalance);
    }
}
