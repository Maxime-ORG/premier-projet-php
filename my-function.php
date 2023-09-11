<?php
function formatPrice($price){
    $prixFormat = "";
    $prixFormat = $prixFormat . number_format($price / 100, 2, ".", " ");
    $prixFormat = $prixFormat . "€";
    return $prixFormat;
}

function priceExcludingVAT($PriceTTC){
    return (100 * $PriceTTC) / (100 + 20);
}

function priceVAT($PriceTTC){
    return ($PriceTTC * 20) / 100;
}

function discountedPrice($Price, $Discount){
    if ($Discount != null) {
        return $Price * (100 - $Discount) / 100;
    }
    else {
        return null;
    }
}

function prixTransport($transporteur, $prixTTC, $poids, $quantity){
    $poids = $poids*$quantity;
    if ($transporteur == "La Poste"){
        if($poids >= 0 and $poids < 500){
            return 300;
        }
        elseif ($poids >= 500 and $poids < 20000){
            return $prixTTC*0.1*100;
        }
        else{
            return 0;
        }
    }
    elseif ($transporteur == "FedEx"){
        if($poids >= 0 and $poids < 500){
            return 500;
        }
        elseif ($poids >= 500 and $poids < 20000){
            return $prixTTC*0.05*100;
        }
        else{
            return 0;
        }
    }
    elseif ($transporteur == "Traineau du père noël"){
        return 0;
    }
    else return null;
}

function catalog(){
    return [
        [
            "name" => "Gyroscope scientifique",
            "priceTTC" => 10000,
            "priceHT" => priceExcludingVAT(10000),
            "weight" => 300,
            "discount" => 10,
            "picture_url" => "./.image/gyroscope-scientifique.jpeg",
        ],
        [
            "name" => "Gyroscope pour enfant",
            "priceTTC" => 3500,
            "priceHT" => priceExcludingVAT(3500),
            "weight" => 350,
            "discount" => null,
            "picture_url" => "./.image/gyroscopePourEnfant.jpg",
        ],
        [
            "name" => "Gyroscope de précision",
            "priceTTC" => 20000,
            "priceHT" => priceExcludingVAT(20000),
            "weight" => 400,
            "discount" => 15,
            "picture_url" => "./.image/gyroscopeDePrecision.jpg",
        ],
    ];
}

