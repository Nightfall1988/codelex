<?php 

# OOP Exercise 8

require_once('Exercise_8_SavingsAccount.php');

class TestAccounts 
{
    private int $interst_rate;

    private int $balance;

    private int $months;

    public function __construct(int $interst_rate, int $balance, int $months)
    {
        $this->interst_rate = $interst_rate;
        $this->balance = $balance;
        $this->months = $months;
    }

    public function GetDataOnAccount(): string {
        $account = new SavingsAccount($this->balance);
        $account->SetAnnualInterestRate($this->interst_rate);

        for($i=0; $i<$this->months; $i++) {
            
            $monthly_deposit = readline("Enter amount deposited for month " .  $i+1 . ": ");
            while (!is_numeric($monthly_deposit)) {
                $monthly_deposit = readline("Sorry, this is not valid input. Enter amount deposited for month " .  $i+1 . ": ");
            }
            $account->Deposit($monthly_deposit);
   
            $monthly_withdraw = readline("Enter amount withdrawn for month " .  $i+1 . ": ");
            while (!is_numeric($monthly_withdraw)) {
                $monthly_withdraw = readline("Sorry, this is not valid input. Enter amount withdrawn for month " .  $i+1 . ": ");
            }
            $account->Withdraw($monthly_withdraw);
   
            $account->AddInterest();
            }

            return $this->PrintAllStats($account);
        }
            
    public function PrintAllStats(object $account): string {
        $deposited = $account->getDeposited();
        $withdrawn = $account->getWithdrawn();
        $balance = $account->getBalance();
        $interest = $account->getInterest();

            return "You have total deposited: $deposited" . "\n" . 
                   "You have total withdrawn: $withdrawn" . "\n" .
                   "Interest earned: $interest" . "\n" .
                   "Ending balance: $balance";
        }

    public function getMonths(): int {
        return $this->months;
    }
}


?>
