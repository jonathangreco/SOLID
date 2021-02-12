<?php

namespace Solid\SingleResponsability\TellDontAsk;

class User
{
    /**
     * @var int
     */
    private $balance;

    public function __construct()
    {
        $this->balance = 100;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    public function payInvoice(int $invoice)
    {
        $value = 0;
        // $value should be defined either with another class (ValueObject), or here and only here if it's appropriate
        $this->balance = $value;
    }
}
