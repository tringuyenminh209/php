<?php

$fruits = ["りんご", "バナナ", "苺", "ぶどう", "キウイ", "パイナップル"];

$vegetable = ["キャベツ", "人参", "ピーマン", "茄子", "かぼちゃ"];

echo "<pre>";
var_dump($fruits, $vegetable);
echo "<pre>";
echo "-----------------------"; 

$food = [$fruits, $vegetable];

echo "<pre>";
var_dump($food);
echo "<pre>";

echo '$food 2 行3列目は、' . $food[1][2] . 'です。';

?>