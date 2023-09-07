<?php
function formatPrice($price){
    $prixFormat = "";
    $prixFormat = $prixFormat.number_format($price/100, 2, ".", " ");
    $prixFormat = $prixFormat ."€";
    return $prixFormat;
}

function priceExcludingVAT($PriceTTC){
    return (100 * $PriceTTC) / (100 + 20);
}

function discountedPrice($Price, $Discount){
    if ($Discount != null) {
        return $Price * (100 - $Discount) / 100;
    }
    else {
        return null;
    }
}