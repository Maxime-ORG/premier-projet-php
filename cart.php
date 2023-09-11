<?php include_once "header.php"?>
<?php include_once "my-function.php"?>
<H1>Panier</H1>
<div class="colonneCart">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo catalog()[$_POST['productKey']]["picture_url"] ?> alt="imageProduit">
    </div>
    <div>
        <p class="gras">Produit</p>
        <?php echo catalog()[$_POST['productKey']]["name"]; ?>
    </div>
    <div>
        <p class="gras">Prix unitaire</p>
        <?php if (catalog()[$_POST['productKey']]["discount"] != 0): ?>
            <?php echo formatPrice(discountedPrice(catalog()[$_POST['productKey']]["priceTTC"],catalog()[$_POST['productKey']]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice(catalog()[$_POST['productKey']]["priceTTC"])?>
        <?php endif; ?>
    </div>
    <div>
        <p class="gras">Quantité</p>
        <?php echo $_POST['quantity']; ?>
        <p class="gras">Total HT</p>
        <p class="gras">TVA</p>
        <p class="gras">Total TTC</p>
    </div>
    <div>
        <p class="gras">Total</p>
        <p>
        <?php if (catalog()[$_POST['productKey']]["discount"] != 0): ?>
            <?php echo formatPrice($_POST['quantity']*discountedPrice(catalog()[$_POST['productKey']]["priceTTC"],catalog()[$_POST['productKey']]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_POST['quantity']*catalog()[$_POST['productKey']]["priceTTC"])?>
        <?php endif; ?><br>
        </p>
        <p>
        <?php if (catalog()[$_POST['productKey']]["discount"] != 0): ?>
            <?php echo formatPrice($_POST['quantity']*discountedPrice(catalog()[$_POST['productKey']]["priceHT"],catalog()[$_POST['productKey']]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_POST['quantity']*catalog()[$_POST['productKey']]["priceHT"])?>
        <?php endif; ?><br>
        </p>
        <p>
            <?php if (catalog()[$_POST['productKey']]["discount"] != 0): ?>
                <?php echo formatPrice($_POST['quantity']*priceVAT(discountedPrice(catalog()[$_POST['productKey']]["priceTTC"],catalog()[$_POST['productKey']]["discount"]))) ?>
            <?php else:?>
                <?php echo formatPrice($_POST['quantity']*priceVAT(catalog()[$_POST['productKey']]["priceTTC"]))?>
            <?php endif; ?><br>
        </p>
        <p>
        <?php if (catalog()[$_POST['productKey']]["discount"] != 0): ?>
            <?php echo formatPrice($_POST['quantity']*discountedPrice(catalog()[$_POST['productKey']]["priceTTC"],catalog()[$_POST['productKey']]["discount"])) ?>
        <?php else:?>
            <?php echo formatPrice($_POST['quantity']*catalog()[$_POST['productKey']]["priceTTC"])?>
        <?php endif; ?>
        </p>
    </div>
</div>
<H2> Choix du transporteur </H2>

<div class="colonneCart3">
    <div>
        <form action="cart.php" method="post">
            <select name="transporteur">
                <option value="La Poste"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] == "La Poste") echo "selected"?>>La Poste</option>
                <option value="FedEx"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] == "FedEx") echo "selected"?>>FedEx</option>
                <option value="Traineau du père noël"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] == "Traineau du père noël") echo "selected"?>>Traineau du père noël</option>
            </select>
            <input type="submit" name="envoi" value="Valider">

            <input type="hidden" id="productKey" name="productKey" value="<?php echo $_POST['productKey'] ?>" />
            <input type="hidden" id="quantity" name="quantity" value="<?php echo $_POST['quantity'] ?>" />
        </form>
    </div>
    <div>
        <p class="gras">Transport</p>
        <p class="gras">Total TTC</p>
    </div>
    <div>
        <p><?php if (isset($_POST['transporteur'])) echo formatPrice(prixTransport($_POST['transporteur'], catalog()[$_POST['productKey']]["priceTTC"], catalog()[$_POST['productKey']]["weight"], $_POST['quantity'])) ?> </p>
        <p>
            <?php if (catalog()[$_POST['productKey']]["discount"] != 0 and isset($_POST['transporteur'])):?>
                <?php echo formatPrice(prixTransport($_POST['transporteur'], catalog()[$_POST['productKey']]["priceTTC"], catalog()[$_POST['productKey']]["weight"], $_POST['quantity']) + $_POST['quantity']*discountedPrice(catalog()[$_POST['productKey']]["priceTTC"],catalog()[$_POST['productKey']]["discount"])) ?>
            <?php elseif (isset($_POST['transporteur'])): ?>
                <?php echo formatPrice(prixTransport($_POST['transporteur'], catalog()[$_POST['productKey']]["priceTTC"], catalog()[$_POST['productKey']]["weight"], $_POST['quantity']) + $_POST['quantity']*catalog()[$_POST['productKey']]["priceTTC"])?>
            <?php endif; ?>
    </div>
</div>

<?php include "footer.php"; ?>