<?php include_once "my-function.php";?>

<div class="colonneCart">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $_SESSION["tableauPanier"][$IDProduit]["picture_url"] ?> alt="imageProduit">
    </div>
    <div>
        <p class="gras">Produit</p>
        <?php echo $_SESSION["tableauPanier"][$IDProduit]["name"]; ?>
    </div>
    <div>
        <p class="gras">Prix unitaire</p>
        <?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
            <?php echo formatPrice(discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"])?>
        <?php endif; ?>
    </div>
    <div>
        <p class="gras">Quantité</p>
        <?php echo $_SESSION["tableauPanier"][$IDProduit]["quantity"]; ?>
        <p class="gras">Total HT</p>
        <p class="gras">TVA</p>
        <p class="gras">Total TTC</p>
    </div>
    <div>
        <p class="gras">Total</p>
        <p>
        <?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*$_SESSION["tableauPanier"][$IDProduit]["priceTTC"])?>
        <?php endif; ?><br>
        </p>
        <p>
        <?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceHT"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*$_SESSION["tableauPanier"][$IDProduit]["priceHT"])?>
        <?php endif; ?><br>
        </p>
        <p>
            <?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
                <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*priceVAT(discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"]))) ?>
            <?php else:?>
                <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*priceVAT($_SESSION["tableauPanier"][$IDProduit]["priceTTC"]))?>
            <?php endif; ?><br>
        </p>
        <p>
        <?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*$_SESSION["tableauPanier"][$IDProduit]["priceTTC"])?>
        <?php endif; ?>
        </p>
    </div>
</div>
