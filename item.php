<?php include_once "header.php"?>
<?php include_once "my-function.php"?>

<div class="colonneCentrale">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo catalog()[$productKey]["picture_url"] ?> alt="imageProduit">
    </div>
    <div class="colonneCentrale-colonne2">
        <div class = "alligne_colonne">
            <H2><?php echo catalog()[$productKey]["name"] ?></H2>
            <p> prix TTC : <?php echo formatPrice(catalog()[$productKey]["priceTTC"])?> </p>
            <p> prix HT : <?php echo formatPrice(catalog()[$productKey]["priceHT"]) ?> </p>
            <?php if (catalog()[$productKey]["discount"] != 0): ?>
            <p> remise : -<?php echo catalog()[$productKey]["discount"] ?> % </p>
            <p> prix avec remise : <?php echo formatPrice(discountedPrice(catalog()[$productKey]["priceTTC"],catalog()[$productKey]["discount"])) ?></p>
            <?php endif; ?>
            <p> poids : <?php echo catalog()[$productKey]["weight"] ?> G </p>

            <form action="cart.php" method="post">
                <label for="quantity">quantité :</label>
                <input type="number" id="quantity" name="quantity" value="0" min="0" max="100"> <br>
                <input type="submit" name="envoi" alt="ok" value="ajouter au panier" class="ajoutPanierBoutonForm">

                <input type="hidden" id="productKey" name="productKey" value="<?php echo $productKey ?>" />
            </form>
        </div>
    </div>
</div>