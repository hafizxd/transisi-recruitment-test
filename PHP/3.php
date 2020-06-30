<?php

function putComma($arr, $wordCount) {
    $str = '';

    foreach ($arr as $key => $value) {
        $count = $key + 1;

        $str = (($count) % $wordCount == 0) && ($count !== count($arr)) ? $str . $value . ', ' : $str . $value . ' ';   
    }

    return $str;
}

function printGram($str) {
    $arr = explode(" ", strtolower($str));

    $unigram = putComma($arr, 1);
    $bigram = putComma($arr, 2);
    $trigram = putComma($arr, 3);

    echo "Unigram = {$unigram} <br>";
    echo "Bigram = {$bigram} <br>";
    echo "Trigram = {$trigram} <br>";
}

printGram('Jakarta adalah ibukota negara Republik Indonesia');

