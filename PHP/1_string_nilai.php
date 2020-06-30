<?php

$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$arr = explode(" ", $nilai);


// Rata-rata
function mean($arr) {
    $total = 0;

    foreach($arr as $value) {
        $total += (int)$value;
    }
    
    $rata_rata = $total / count($arr);
    return $rata_rata;
}


// 7 nilai tertinggi
function highest($arr) {
    arsort($arr);

    $slice = array_slice($arr, 0, 7);
    
    $nilai_tertinggi = implode(" ", $slice);

    return $nilai_tertinggi;
}


// 7 nilai terendah
function lowest($arr) {
    asort($arr);

    $slice = array_slice($arr, 0, 7);
    
    $nilai_terendah = implode(" ", $slice);

    return $nilai_terendah;
}


echo "nilai rata-rata = " . mean($arr);
echo '<br />';
echo "7 nilai tertinggi = " . highest($arr);
echo '<br />';
echo "7 nilai terendah = " . lowest($arr);