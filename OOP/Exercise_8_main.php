<?php 
require_once('Exercise_8_TestAccounts.php');
# OOP Exercise 8
$balance = readline('How much money is in the account?: ');

while (!is_numeric($balance)) {
    $balance = readline('Sorry, this is not valid input. How much money is in the account?: ');
}

$rate = readline('Enter the annual interest rate: ');

while (!is_numeric($rate)) {
    $rate = readline('Sorry, this is not valid input. Enter the annual interest rate: ');
}

$months = readline('How long has the account been opened? ');

while (!is_numeric($months)) {
    $months = readline('Sorry, this is not valid input. How much money is in the account?: ');
}
$test = new TestAccounts($rate, $balance, $months);
echo $test->GetDataOnAccount();


?>