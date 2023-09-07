<?php include_once "header.php"?>
<?php include_once "my-function.php"?>
<?php include_once "multidimensional-catalog.php"?>

<div class="colonneCentrale">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $products[$productKey]["picture_url"] ?> alt="imageProduit">
    </div>
    <div class="colonneCentrale-colonne2">
        <div class = "alligne_colonne">
            <H2><?php echo $products[$productKey]["name"] ?></H2>
            <p> prix TTC : <?php echo formatPrice($products[$productKey]["priceTTC"])?> </p>
            <p> prix HT : <?php echo formatPrice($products[$productKey]["priceHT"]) ?> </p>
            <?php if ($products[$productKey]["discount"] != 0): ?>
            <p> remise : -<?php echo $products[$productKey]["discount"] ?> % </p>
            <p> prix avec remise : <?php echo formatPrice(discountedPrice($products[$productKey]["priceTTC"],$products[$productKey]["discount"])) ?></p>
            <?php endif; ?>
            <p> poids : <?php echo $products[$productKey]["weight"] ?> G </p>
            <p> <label for="quantity">quantité :</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100"></p>
            <button class="ajouterPanierBouton" type="button">Ajouter au Panier</button>
        </div>
    </div>
</div>