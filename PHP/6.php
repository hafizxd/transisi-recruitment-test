<?php

$arr = [
 ['f', 'g', 'h', 'i'],
 ['j', 'k', 'p', 'q'],
 ['r', 's', 't', 'u']
];

function cari($arr, $input) {
    $flatArr = array_merge(...$arr);
    $inputArr = str_split($input);

    foreach ($inputArr as $char) {
        if (!in_array($char, $flatArr)) return false;
    } 

    return true;
}

if (cari($arr, 'fjrstp')) echo 'true';
else echo 'false';