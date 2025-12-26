<?php

$fruits = [
    "apple" => 220,
    "banana" => 110,
    "strawberry" => 490,
    "grape" => 550,
    "kiwi" => 160
];

$vegetable = [
    "cabbage" => 130,
    "carrot" => 80,
    "greenPepper" => 120,
    "eggplant" => 160,
    "pumpkin" => 240    
];

echo "<pre>";
var_dump($fruits);
echo "</pre>";


$food = [
    "fruits" => $fruits,
    "vegetable" => $vegetable
];

echo "<pre>";
var_dump($food);
echo "</pre>";

echo '【第3段階】配列$fruitsの中身をforeachで順番に表示します。<br>';

foreach($fruits as $key => $value){
    echo $key . ':' . $value . '円<br>';
}

echo "------------------------------------";

echo '【第4段階】配列$foodの中身をforeachで種別ごとに、順番に表示します。<br>';

foreach($food as $foodkey => $foodvalue){
    echo '■種別：' . $foodkey . '<br>';
    foreach($foodvalue as $key => $value){
        echo '　商品名：' . $key . '　/　価格：' . $value . '円<br>';
    }
}
?>