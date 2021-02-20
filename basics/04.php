<?php
// 01
$numbers = [1,2,3,4,5,6,7,8,9,10];

foreach ($numbers as $num) {
    echo $num;
}

// 02

$numbers = [1,2,3,4,5,6,7,8,9,10];

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i];
}

// 03
$x = 1;
while ($x < 10) {
    echo 'codelex';
    $x += 1;
}

// 04

$numbers = [1,2,3,4,5,6,7,8,9,10];

foreach ($numbers as $num) {
    if($num % 3 == 0) {
        echo $num;
    }
}

// 05
$persons = [
    [
        [
            "name" => "John",
            "surname" => "Kennedy",
            "age" => 44,
            "birthday" => "May 29"
        ],
        [
            "name" => "Ronald",
            "surname" => "Reagan",
            "age" => 67,
            "birthday" => "Feb 6"
        ],
        [
            "name" => "Richard",
            "surname" => "Nixon",
            "age" => 67,
            "birthday" => "Jan 20"
        ]
    ]
];

foreach ($persons[0] as $person) {
    echo "Hello, I am " . $person["name"] . ' ' . $person["surname"] . ' I was born on ' . $person['birthday'] . ', ' . $person['age'] . ' years ago' . "\n";
}
?>