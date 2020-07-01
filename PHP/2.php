<?php

function countLowerCase($input) {
    $arr = str_split($input);
    
    $count = 0;
    foreach ($arr as $value) {
        if (ctype_lower($value)) $count++;
    }

    $output = " \"{$input}\" mengandung {$count} buah huruf kecil.";
    return $output;
}

echo countLowerCase('TranSISI');

