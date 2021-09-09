<?php declare(strict_types=1);

namespace BankAccount;

use App\BankAccount;
use App\Exception\BankAccountException;
use PHPUnit\Framework\TestCase;

final class BankAccountTest extends TestCase
{
    public function testGetBalance(): void
    {
        $amount = 20000;
        $bankAccount = new BankAccount($amount);

        $this->assertEquals($amount, $bankAccount->getBalance());
        $this->assertIsInt($bankAccount->getBalance());

        $amount = 0;
        $bankAccount = new BankAccount($amount);

        $this->assertEquals($amount, $bankAccount->getBalance());
        $this->assertIsInt($bankAccount->getBalance());
    }

    public function testAddToBalance(): void
    {
        $amount = 20000;
        $amountToAdd = 10000;
        $bankAccount = new BankAccount($amount);
        $bankAccount->addToBalance($amountToAdd);

        $this->assertEquals($amount + $amountToAdd, $bankAccount->getBalance());

        $amount = 30000;
        $amountToAdd = 40000;
        $bankAccount = new BankAccount($amount);
        $bankAccount->addToBalance($amountToAdd);

        $this->assertEquals($amount + $amountToAdd, $bankAccount->getBalance());

        $amount = 30000;
        $amountToAdd = -40000;
        $bankAccount = new BankAccount($amount);

        $catch = false;
        try {
            $bankAccount->addToBalance($amountToAdd);
        } catch (BankAccountException $exception) {
            $catch = true;
        }
        $this->assertTrue($catch);
    }

    public function testRemoveFromBalance(): void
    {
        $amount = 20000;
        $amountToRemove = 10000;
        $bankAccount = new BankAccount($amount);
        $bankAccount->removeFromBalance($amountToRemove);

        $this->assertEquals($amount - $amountToRemove, $bankAccount->getBalance());

        $amount = 30000;
        $amountToRemove = 20000;
        $bankAccount = new BankAccount($amount);
        $bankAccount->removeFromBalance($amountToRemove);

        $this->assertEquals($amount - $amountToRemove, $bankAccount->getBalance());

        $amount = 0;
        $amountToRemove = 10000;
        $bankAccount = new BankAccount($amount);

        $catch = false;
        try {
            $bankAccount->removeFromBalance($amountToRemove);
        } catch (BankAccountException $exception) {
            $catch = true;
        }
        $this->assertTrue($catch);
    }

    public function testTransferToAccount(): void
    {
        $amount1 = 20000;
        $amount2 = 10000;
        $amountToTransfer = 10000;
        $bankAccount1 = new BankAccount($amount1);
        $bankAccount2 = new BankAccount($amount2);

        $bankAccount1->transferToAccount($bankAccount2, $amountToTransfer);

        $this->assertEquals($amount1 - $amountToTransfer, $bankAccount1->getBalance());
        $this->assertEquals($amount2 + $amountToTransfer, $bankAccount2->getBalance());
    }
}
