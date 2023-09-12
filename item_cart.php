<?php include_once "my-function.php";?>

<div class="colonneCart">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $_SESSION["tableauPanier"][$IDProduit]["picture_url"] ?> alt="imageProduit">
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?php echo $_SESSION["tableauPanier"][$IDProduit]["name"]; ?></th>
                    <th><?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
                            <?php echo formatPrice(discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
                        <?php else:?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"])?>
                        <?php endif; ?></th>
                    <th><?php echo $_SESSION["tableauPanier"][$IDProduit]["quantity"]; ?></th>
                    <th><?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
                        <?php else:?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*$_SESSION["tableauPanier"][$IDProduit]["priceTTC"])?>
                        <?php endif; ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total HT</th>
                    <th><?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceHT"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
                        <?php else:?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*$_SESSION["tableauPanier"][$IDProduit]["priceHT"])?>
                        <?php endif; ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>TVA</th>
                    <th><?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*priceVAT(discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"]))) ?>
                        <?php else:?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*priceVAT($_SESSION["tableauPanier"][$IDProduit]["priceTTC"]))?>
                        <?php endif; ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total TTC</th>
                    <th><?php if ($_SESSION["tableauPanier"][$IDProduit]["discount"] != 0): ?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*discountedPrice($_SESSION["tableauPanier"][$IDProduit]["priceTTC"],$_SESSION["tableauPanier"][$IDProduit]["discount"])) ?>
                        <?php else:?>
                            <?php echo formatPrice($_SESSION["tableauPanier"][$IDProduit]["quantity"]*$_SESSION["tableauPanier"][$IDProduit]["priceTTC"])?>
                        <?php endif; ?></th>
                </tr>
            </tbody>
        </table>
        <form action="cart2.php" method="post" name="formDelete">
            <input type="submit" name="envoi" value="Retirer l'article">
            <input type="hidden" id="DeleteOneArticle" name="DeleteOneArticle" value=true />
            <input type="hidden" id="FormDeleteProductKey" name="FormDeleteProductKey" value="<?php echo $IDProduit ?>"/>
        </form>
    </div>
</div>
