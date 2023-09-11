<?php

$i = -1;
while ($i <= 1) {
    $i++;
    echo catalog()[$i]["name"];
    echo catalog()[$i]["price"];
    echo catalog()[$i]["discount"];
    echo catalog()[$i]["weight"];
}

$i = -1;
do{
    $i++;
    echo catalog()[$i]["name"];
    echo catalog()[$i]["price"];
    echo catalog()[$i]["discount"];
    echo catalog()[$i]["weight"];
}
while($i <= 1);

for($i=0; $i<=2; $i++){
    echo catalog()[$i]["name"];
    echo catalog()[$i]["price"];
    echo catalog()[$i]["discount"];
    echo catalog()[$i]["weight"];
}

foreach(catalog() as  $value){
    foreach($value as  $value2) {
        echo $value2;
    }
}

