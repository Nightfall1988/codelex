<?php 

// 01

$arr = [13,17, 23];

echo array_sum($arr);

// 02

$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];

var_dump($person['name']);
var_dump($person['surname']);
var_dump($person['age']);

// 03

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

var_dump($person->name);
var_dump($person->surname);
var_dump($person->age);

// 04

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

echo $items[0][1]['name'] . ' ' . $items[0][1]['surname'] . ' ' . $items[0][1]['age'];

//05

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

echo $items[0][0]['name'] . ' & ' . $items[0][1]['name'] . ' ' . $items[0][1]['surname'] . '`s';
?>