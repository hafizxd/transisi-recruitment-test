<?php

// convert num to alpha
function toAlpha($num) {
    return chr($num);
}

// convert alpha to num
function toNum($char) {
    return ord($char);
}

function encrypt($input) {
    $arr = str_split($input);

    $encryptedInput = '';

    $count = 1;
    foreach ($arr as $char) {
        $num = toNum($char);
        $encryptedNum = $count % 2 !== 0 ? $num + $count : $num - $count;
        
        $alpha = toAlpha($encryptedNum);
        $encryptedInput = $encryptedInput . $alpha;

        $count++;
    }

    return $encryptedInput;
}

echo encrypt('DFHKNQ');