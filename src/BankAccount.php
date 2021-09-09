<?php declare(strict_types=1);

namespace App;

use App\Exception\BankAccountException;

class BankAccount
{
    protected int $balance;

    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function addToBalance(int $amount): void
    {
        $this->validateAmount($amount);
        $this->balance += $amount;
    }

    /**
     * @throws BankAccountException
     */
    public function removeFromBalance(int $amount): void
    {
        $this->validateAmount($amount);
        if ($amount > $this->balance) {
            throw new BankAccountException('Not enough money');
        }

        $this->balance -= $amount;
    }

    public function transferToAccount(self $bankAccount, int $amount): void
    {
        $this->removeFromBalance($amount);
        $bankAccount->addToBalance($amount);
    }

    /**
     * @throws BankAccountException
     */
    protected function validateAmount(int $amount): self
    {
        if ($amount < 0) {
            throw new BankAccountException('Amount to credit cannot be lesser than 0');
        }

        return $this;
    }
}
