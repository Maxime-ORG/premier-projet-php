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

function prixTotal($tableauPanier){
    $total = 0;
    foreach ($tableauPanier as $AttributProduitKey => $AttributProduit){
        if ($tableauPanier[$AttributProduitKey]["discount"] != 0)
            $total = $total + $tableauPanier[$AttributProduitKey]["quantity"]*$tableauPanier[$AttributProduitKey]["priceTTC"]/100 * (100- $tableauPanier[$AttributProduitKey]["discount"]);
        else
            $total = $total + $tableauPanier[$AttributProduitKey]["quantity"]*$tableauPanier[$AttributProduitKey]["priceTTC"];
    }
    return $total;
}





function prixTransport($transporteur, $tableauPanier){
    $poids = 0;
    $prixTotal = prixTotal($tableauPanier);
    foreach ($tableauPanier as $AttributProduitKey => $AttributProduit){
        $poids = $poids + $tableauPanier[$AttributProduitKey]["weight"]*$tableauPanier[$AttributProduitKey]["quantity"];
    }
    if ($transporteur == "La Poste"){
        if($poids >= 0 and $poids < 5000){
            return 300;
        }
        elseif ($poids >= 5000 and $poids < 20000){
            return $prixTotal * 0.1;
        }
        else{
            return 0;
        }
    }
    elseif ($transporteur == "FedEx"){
        if($poids >= 0 and $poids < 5000){
            return 500;
        }
        elseif ($poids >= 5000 and $poids < 20000){
            return $prixTotal * 0.05;
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

function insertTableauPanier(int $quantite, $IDtableauPanier, $tableauPanier){
    if (isset($tableauPanier[$IDtableauPanier]["quantity"])){
        $tableauPanier[$IDtableauPanier]["quantity"] = $tableauPanier[$IDtableauPanier]["quantity"] + $quantite;
    }
    else {
        foreach (catalog()[$IDtableauPanier] as $AttributProduitKey => $AttributProduit) {
            $tableauPanier[$IDtableauPanier][$AttributProduitKey] = catalog()[$IDtableauPanier][$AttributProduitKey];
        }
        $tableauPanier[$IDtableauPanier]["quantity"] = $quantite;
    }
    $_SESSION['tableauPanier'] = $tableauPanier;
}

function removeTableauPanier($IDProduit){
    unset($_SESSION["tableauPanier"][$IDProduit]) ;
}

