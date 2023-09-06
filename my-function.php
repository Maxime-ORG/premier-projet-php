<?php
function formatPrice($price){
    if ($price != null) {
        echo $price / 100;
        echo "€";
    }
    else {
        return null;
    }
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