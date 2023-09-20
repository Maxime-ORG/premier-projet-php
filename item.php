<?php include_once "header.php"?>
<?php include_once "my-function.php"?>

<div class="colonneCentrale">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $product["picture_url"] ?> alt="imageProduit">
    </div>
    <div class="colonneCentrale-colonne2">
        <div class = "alligne_colonne">
            <H2><?php echo $product["name"] ?></H2>
            <p> prix TTC : <?php echo formatPrice( $product["price"])?> </p>
            <p> prix HT : <?php echo formatPrice( priceExcludingVAT($product["price"])) ?> </p>
            <?php if ( $product["discount"] != 0): ?>
            <p> remise : -<?php echo $product["discount"] ?> % </p>
            <p> prix avec remise : <?php echo formatPrice(discountedPrice( $product["price"], $product["discount"])) ?></p>
            <?php endif; ?>
            <p> poids : <?php echo $product["weight"] ?> G </p>

            <form action="Full-list-website.php" method="post">
                <label for="quantity">quantité :</label>
                <input type="number" id="quantity" name="quantity" value="0" min="0" max="100"> <br>
                <input type="submit" name="envoi" alt="ok" value="ajouter au panier" class="ajoutPanierBoutonForm">
                <input type="hidden" id="productKey" name="productKey" value="<?php echo $productKey ?>" />
            </form>
        </div>
    </div>
</div>