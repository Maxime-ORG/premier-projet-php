
<div class="colonneCentrale">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $product["picture_url"] ?> alt="imageProduit">
    </div>
    <div class="colonneCentrale-colonne2">
        <div class = "alligne_colonne">
            <H2><?php echo $product["name"] ?></H2>
            <p> prix TTC : <?php formatPrice($product["priceTTC"]) ?> </p>
            <p> prix HT : <?php formatPrice($product["priceHT"]) ?> </p>
            <p> remise : <?php echo $product["discount"] ?> % </p>
            <p> prix avec remise : <?php echo formatPrice(discountedPrice($product["priceTTC"],$product["discount"])) ?></p>
            <p> poids : <?php echo $product["weight"] ?> G </p>
            <button class="ajouterPanierBouton" type="button">Ajouter au Panier</button>
        </div>
    </div>
</div>

