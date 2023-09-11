<?php include_once "header.php"?>
<?php include_once "my-function.php"?>
<?php session_start(); ?>


    <H1>Panier</H1>

    <?php if (isset($_SESSION["tableauPanier"]))
    foreach($_SESSION["tableauPanier"] as $IDProduit => $atributProduit){
        include "item_cart.php";
    }
    ?>

    <?php if (isset($_SESSION["tableauPanier"])) {?>
        <H2> Choix du transporteur </H2>

        <div class="colonneCart3">
            <div>
                <form action="cart2.php" method="post">
                    <select name="transporteur">
                        <option value="La Poste"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] == "La Poste") echo "selected"?>>La Poste</option>
                        <option value="FedEx"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] == "FedEx") echo "selected"?>>FedEx</option>
                        <option value="Traineau du père noël"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] == "Traineau du père noël") echo "selected"?>>Traineau du père noël</option>
                    </select>
                    <input type="submit" name="envoi" value="Valider">
                </form>
                <form action="cart2.php" method="post" name="formDelete">
                    <input type="submit" name="envoi" value="Vider le Panier">
                    <input type="hidden" id="Delete" name="Delete" value=true />
                </form>
            </div>
            <div>
                <p class="gras">Total TTC</p>
                <p class="gras">Transport</p>
                <p class="gras">Total TTC + Transport</p>
            </div>
            <div>
                <p><?php echo formatPrice(prixTotal()) ?></p>
                <p><?php if (isset($_POST['transporteur'])) echo formatPrice(prixTransport($_POST['transporteur'])) ?></p>
                <p><?php if (isset($_POST['transporteur'])) echo formatPrice(prixTransport($_POST['transporteur']) + prixTotal()) ?></p>
            </div>
        </div>
    <?php }?>

<?php if (isset($_POST['Delete'])) $_SESSION = array() ?>
<?php include "footer.php"; ?>