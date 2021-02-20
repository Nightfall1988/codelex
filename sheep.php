<?php
$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'sheep', 'sheep', 'wolf', 'sheep',];
$newList = [];

for ($i = 0; $i < count($animals) - 1; $i++) {

    if ($animals[$i + 1] == 'wolf') {
        array_push($newList, 'OMG');
    } else if ($animals[$i] === 'wolf') {
        array_push($newList, 'HEHE');
    } else {
        array_push($newList, 'HAPPY');
    }
}

echo implode($newList, ', ');