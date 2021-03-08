<?php

class BankAccount
{
    private string $name;

    private float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }
    public function show_user_name_and_balance(): string
    {
        $amount = $this->format_money();
        $details = "$this->name, $amount";
        return $details;
    }

    public function format_money(): string 
    {
        $balance = sprintf("%0.2f",$this->balance);
        return $balance;
    }

    public function get_balance(): float
    {
        return $this->balance;
    }
 
}

$b = new BankAccount('John', -1200);
echo $b->show_user_name_and_balance();