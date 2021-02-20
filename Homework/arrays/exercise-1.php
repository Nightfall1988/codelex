<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
foreach ($numbers as $number) {
    echo $number . "\n";
}

//todo
sort($numbers);
for ($i=0; $i<count($numbers); $i++) {
   echo $numbers[$i] . "\n";
}

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo

foreach ($words as $word) {
    echo $word . "\n";
}
//todo
sort($words);
for ($i=0; $i<count($words); $i++) {
    echo $words[$i] . "\n";
}