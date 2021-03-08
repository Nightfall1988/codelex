<?php 

# OOP Exercise 8

class SavingsAccount 
{
    private float $balance;

    private float $interest_rate;

    private float $deposited;

    private float $withdrawn;

    private float $interest;

    public function __construct(int $starting_balance)
    {
        $this->balance = $starting_balance;
        $this->deposited = 0;
        $this->interest = 0;
        $this->withdrawn = 0;
    }

    public function GetBalance(): float {
        return $this->balance;
    }

    public function GetAnnualInterestRate(): float {
        return $this->interest_rate;
    }

    public function SetAnnualInterestRate(int $rate): float {
        $this->interest_rate = $rate;
        return $this->interest_rate;
    }

    public function Deposit(int $deposit_amount): float {
        $this->balance = $this->balance + $deposit_amount;
        $this->deposited += $deposit_amount;

        return $this->balance;
    }

    public function Withdraw(int $withdraw_amount): float {
        $this->balance = $this->balance - $withdraw_amount;
        $this->withdrawn += $withdraw_amount;
        return $this->balance;
    }

    public function CountInterest() {
        $monthly_percentage = $this->interest_rate / 12;
        $monthly_percentage = round($monthly_percentage, 2);
        $monthly_profit = $this->balance * $monthly_percentage;
        $this->interest += $monthly_profit;
        return $monthly_profit;
    }

    public function AddInterest(): float
    {
        $profit = $this->CountInterest();
        $this->balance = $this->balance + $profit;
        return round($this->balance, 2);
    }

    public function GetInterest(): float {
        return round($this->interest, 2);
    }

    public function GetDeposited(): float {
        return $this->deposited;
    }

    public function GetWithdrawn(): float {
        return $this->withdrawn;
    }


}


?>