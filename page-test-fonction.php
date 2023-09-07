<?php
include "multidimensional-catalog.php";

$i = -1;
while ($i <= 1) {
    $i++;
    echo $products[$i]["name"];
    echo $products[$i]["price"];
    echo $products[$i]["discount"];
    echo $products[$i]["weight"];
}

$i = -1;
do{
    $i++;
    echo $products[$i]["name"];
    echo $products[$i]["price"];
    echo $products[$i]["discount"];
    echo $products[$i]["weight"];
}
while($i <= 1);

for($i=0; $i<=2; $i++){
    echo $products[$i]["name"];
    echo $products[$i]["price"];
    echo $products[$i]["discount"];
    echo $products[$i]["weight"];
}

foreach($products as  $value){
    foreach($value as  $value2) {
        echo $value2;
    }
}

