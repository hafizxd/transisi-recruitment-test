<?php

function putComma($arr, $wordCount) {
    $str = '';
    $count = 0;

    foreach ($arr as $word) {
        $count++;

        $str = ($count % $wordCount == 0) && ($count !== count($arr)) ? $str . $word . ', ' : $str . $word . ' ';   
    }

    return $str;
}

function printGram($input) {
    $arr = explode(" ", strtolower($input));

    $unigram = putComma($arr, 1);
    $bigram = putComma($arr, 2);
    $trigram = putComma($arr, 3);

    $output = [
        "Unigram = {$unigram} <br>",
        "Bigram = {$bigram} <br>",
        "Trigram = {$trigram} <br>"
    ];

    return $output;
}

$grams = printGram('Jakarta adalah ibukota negara Republik Indonesia');

foreach($grams as $gram) {
    echo $gram;
}

