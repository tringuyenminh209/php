<?php

$fruits = ["りんご", "バナナ", "苺", "ぶどう", "キウイ", "パイナップル"];

echo "配列fruits の3番目の値は「 " . $fruits[2] . "」です。 ";

echo "<pre>";
print_r($fruits);
echo "</pre>";

echo "配列1番目を上書き";

$fruits[0] = "スイカ";

echo "<pre>";
print_r($fruits);
echo "</pre>";

?>