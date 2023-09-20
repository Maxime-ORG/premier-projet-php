<?php include_once "my-function.php";
$tableauPanier = $allProductCart?>


<div class="colonneCart">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $tableauPanier[$IDProduit]["picture_url"] ?> alt="imageProduit">
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
                    <th><?php echo $tableauPanier[$IDProduit]["name"]; ?></th>
                    <th><?php if ($tableauPanier[$IDProduit]["discount"] != 0):
                            echo formatPrice(discountedPrice($tableauPanier[$IDProduit]["price"],$tableauPanier[$IDProduit]["discount"]));
                        else:
                            echo formatPrice($tableauPanier[$IDProduit]["price"]);
                        endif; ?></th>
                    <th><?php echo $tableauPanier[$IDProduit]["quantity"]; ?></th>
                    <th><?php if ($tableauPanier[$IDProduit]["discount"] != 0):
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*discountedPrice($tableauPanier[$IDProduit]["price"],$tableauPanier[$IDProduit]["discount"]));
                        else:
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*$tableauPanier[$IDProduit]["price"]);
                        endif; ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total HT</th>
                    <th><?php if ($tableauPanier[$IDProduit]["discount"] != 0):
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*discountedPrice(priceExcludingVAT($tableauPanier[$IDProduit]["price"]),$tableauPanier[$IDProduit]["discount"]));
                        else:
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*$tableauPanier[$IDProduit]["priceHT"]);
                        endif; ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>TVA</th>
                    <th><?php if ($tableauPanier[$IDProduit]["discount"] != 0):
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*priceVAT(discountedPrice($tableauPanier[$IDProduit]["price"],$tableauPanier[$IDProduit]["discount"])));
                        else:
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*priceVAT($tableauPanier[$IDProduit]["price"]));
                        endif; ?></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total TTC</th>
                    <th><?php if ($tableauPanier[$IDProduit]["discount"] != 0):
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*discountedPrice($tableauPanier[$IDProduit]["price"],$tableauPanier[$IDProduit]["discount"]));
                        else:
                            echo formatPrice($tableauPanier[$IDProduit]["quantity"]*$tableauPanier[$IDProduit]["price"]);
                        endif; ?></th>
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
