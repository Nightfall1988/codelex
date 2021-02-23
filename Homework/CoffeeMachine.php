<?php

// Value => amount

$wallet = [
    100 => 2,
    50 => 5,
    20 => 5,
    10 => 10,
    5 => 5,
    2 => 5,
    1 => 5
];

$drinkSelection = [

    "1" => ['Latte', 270],
    "2" => ['Cappucino', 350],
    "3" => ['Americano', 130]
];

function CoffeeMachine($wallet, $drinkSelection) {

    $selection = GetSelection($drinkSelection);
    
    if (isAffordable($selection, $wallet)) {

        $total_money = CountMoney($selection, $wallet);
        $wallet = $total_money[0];
        $total_coins = $total_money[1];
        $coin_values = array_keys($wallet);

        $arrayChange = CountChange($total_coins, $selection[1], $coin_values);
        echo "Your change: " . "\n";
        $wallet = AddChangeToWallet($wallet, $arrayChange);

        foreach ($arrayChange as $value => $amount) {
            echo "$amount of coins of type $value " . "\n";
        }

        echo "Your wallet now has: " . "\n";
        foreach ($wallet as $value => $amount) {
            echo " $amount of coins of type $value " . "\n";
        }
    } else {
        return 'Not enough money';
    }
}



function GetSelection($drinkSelection) {

    $choice = readline("Latte, Euro: 2.70 [1] " . "Capuccino, Euro: 3.50 [2] " . "Americano, Euro: 1.30 [3]");

    while (!in_array($choice, array_keys($drinkSelection))) {
        echo "Sorry, this drink is not available" . "\n";
        $choice = readline("Latte, Euro: 2.70 [1] " . "Capuccino, Euro: 3.50 [2] " . "Americano, Euro: 1.30 [3]");
    }

    return $drinkSelection["$choice"];
}

function isAffordable($choice, $wallet) {
    $totalMoney = 0;
    foreach ($wallet as $coin => $amount) {
        $totalMoney += ($coin * $amount);
    }
    return $totalMoney >= $choice[1];
}

function CountMoney($selection, $wallet) {
    $total_coins = 0;
    while($total_coins < $selection[1]) {
        $coin = readline('Enter coins please: ');
        if (!key_exists($coin, $wallet)) {
            echo "Sorry, machine doesnt accept these coins" . "\n";
        } elseif ($wallet[$coin] == 0) {
            echo "Sorry, you dont have enough coins of this type" . "\n";
        } else {
            $wallet[$coin] = $wallet[$coin]-1;
            $total_coins += $coin;
        }
    }

    $money = [$wallet, $total_coins];
    return $money;
}

function CountChange($total_coins, $selection, $coins) {

    $change = $total_coins - $selection;
    $changeArr = [];

    for ($i = 0; $i < count($coins); $i++) {

        if (($change / $coins[$i] < 1 )) {
            continue;
        } else {
            if (($change / $coins[$i] != 0)) {
                $eachCoin = intval($change / $coins[$i]);
                $changeArr[$coins[$i]] = $eachCoin;
                $change = $change - $coins[$i] * $eachCoin;
                continue;
            }
        }
    }
    return $changeArr;
}

function AddChangeToWallet($wallet, $change) {
    foreach ($change as $coin => $amount) {
        $wallet[$coin] += $amount;
    }
    return $wallet;
}

echo CoffeeMachine($wallet, $drinkSelection);

?>
