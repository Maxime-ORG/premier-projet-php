<?php
function formatPrice($price){
    $prixFormat = "";
    $prixFormat = $prixFormat . number_format($price , 2, ".", " ");
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
            $total = $total + $tableauPanier[$AttributProduitKey]["quantity"]*$tableauPanier[$AttributProduitKey]["price"]/100 * (100- $tableauPanier[$AttributProduitKey]["discount"]);
        else
            $total = $total + $tableauPanier[$AttributProduitKey]["quantity"]*$tableauPanier[$AttributProduitKey]["price"];
    }
    return $total;
}





function prixTransport(string $nameCarrier){

    $SelectCarrier = $GLOBALS["db"]->prepare('SELECT * FROM carrier WHERE name = :nameCarrier');
    $SelectCarrier->execute(['nameCarrier' => $nameCarrier]);
    $SelectedCarrier = $SelectCarrier->fetchAll();


    $SumWeight = $GLOBALS["db"]->prepare('SELECT sum(weight) FROM products INNER JOIN cart ON products.id = cart.id_product');
    $SumWeight->execute();
    $exSumWeight = $SumWeight->fetchAll();

    if ($exSumWeight[0]["sum(weight)"] >= 0 and $exSumWeight[0]["sum(weight)"] < 5000) {
        return $SelectedCarrier[0]['full_price'];
    } elseif ($exSumWeight[0]["sum(weight)"] >= 5000 and $exSumWeight[0]["sum(weight)"] < 20000) {
        return  $SelectedCarrier[0]['middle_price'];
    } else {
        return $SelectedCarrier[0]['lowest_price'];
    }
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

function removeTableauPanier(int $IDProduit){
    echo $IDProduit;
    $DelProduct = $GLOBALS["db"]->prepare('delete from cart where id = (select id from (select id from cart order by id limit :IDProduit,1) as t)');
    $DelProduct->execute(["IDProduit" => $IDProduit]);
}

