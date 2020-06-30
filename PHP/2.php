<?php

function countLowerCase($str) {
    $arr = str_split($str);
    
    $count = 0;

    foreach ($arr as $value) {
        if (ctype_lower($value)) $count += 1;
    }

    echo " \"{$str}\" mengandung {$count} buah huruf kecil.";
}

countLowerCase('TranSISI');

