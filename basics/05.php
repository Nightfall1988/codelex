###### Exercise 7**

Imagine you own a gun store. 
Only certain guns can be purchased with license types.
Create an object (person) that will be the requester to purchase a gun (object)
Person object has a name, valid licenses (multiple) & cash.
Guns are objects stored within an array.
Each gun has license letter, price & name.
Using PHP in-built functions determine if the requester (person) can buy a gun from the store.


<?php 

# Exercise 1

function Concat(string $str): string {
    return $str + ' codelex';
}

# Exercise 2

function Sum(int $val1, int $val2): int {
    return $val1 * $val2;
}

# Exercise 3
$person = new stdClass();
$person->age = 26;
$person->name = "John";

function ReachedAge(object $person): string {
    if ($person->age >= 18) {
        return $person->name . " has reached 18 years";
    } else {
        return $person->name . " has not reached 18 years";
    }
}

# Exercise 4

$person1 = new stdClass();
$person1->age = 26;
$person1->name = "John";

$person2 = new stdClass();
$person2->age = 16;
$person2->name = "Jane";

$person3 = new stdClass();
$person3->age = 18;
$person3->name = "Anne";

$people = [$person1, $person2, $person3];

foreach($people as $person) {
    echo ReachedAge($person);
}

# Exercise 5

$fruits = [
    "pineapple" => 6,
    "watermelon" => 15,
    "apple" => 2,
    "cantalope" => 13
];

function DetectFruit($list): string {
    $ship_price = 0;
    foreach ($list as $key => $val) {
        $costs = [1,2];

        if ($val < 10) {
            return "To ship " . $key . " you need " . $ship_price = $val * $costs[0] . "\n";
        } else {
            return "To ship " . $key . " you need " . $ship_price = $val * $costs[1] . "\n";
        }
    }
}

//echo DetectFruit($fruits);

# Exercise 6

$list = [3,45,21,4.25,'stuff'];

function Multiply(array $list): string {
    $doubled_numbers = [];
    for ($i=0; $i<count($list); $i++) {
        if (gettype($list[$i]) == 'integer') {
        array_push($doubled_numbers,$list[$i] * 2);
        }
    }
    return $doubled_numbers_str = implode($doubled_numbers, ', ');
}

//echo Multiply($list);

# Exercise 7

$person = new stdClass();
$person->name = 'John';
$person->licenses = ['A'];
$person->cash = 7000;

function CanBuyAGun($requester) {

    $glock = new stdClass();
    $glock->licenseLetter = 'A';
    $glock->price = 19.99;
    $glock->name = 'Glock';

    $colt = new stdClass();
    $colt->licenseLetter = 'B';
    $colt->price = 59.99;
    $colt->name = 'Colt';

    $rifle = new stdClass();
    $rifle->licenseLetter = 'C';
    $rifle->price = 159.99;
    $rifle->name = 'M-16 Rifle';

    $guns = [$glock, $colt, $rifle];

    $availableGuns = [];
    foreach ($guns as $gun) {
        if(in_array($gun->licenseLetter, $requester->licenses) && ($gun->price <= $requester->cash)) {
            array_push($availableGuns, $gun);
        };
    }

    if (count($availableGuns) == 0) {
        return "$requester->name may not buy any gun from the store";
    } else {
        return "$requester->name is allowed to buy a gun from the store";
    }
}

//echo CanBuyAGun($person);

?>

