<?php
 session_start();
try {
    $GLOBALS["db"] = new PDO('mysql:host=localhost;dbname=e_commerce;charset=utf8', 'user-e_commerce', '_-3-nO9bt.L*6jS-');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$allProductCartStatement = $GLOBALS["db"]->prepare('SELECT * FROM products INNER JOIN cart ON products.id = cart.id_product');
$allProductCartStatement->execute();
$allProductCart = $allProductCartStatement->fetchAll();

include_once "header.php";
include_once "my-function.php";
?>



    <H1>Panier</H1>

    <?php if (isset($allProductCart))
    foreach($allProductCart as $IDProduit => $atributProduit){
        include "item_cart.php";
    }
    ?>

    <?php if (isset($allProductCart) and count($allProductCart) > 0) {?>
        <H2> Choix du transporteur </H2>

        <div class="colonneCart3">
            <div>
                <form action="cart2.php" method="post">
                    <select name="transporteur">
                        <option value="La Poste"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] === "La Poste") echo "selected"?>>La Poste</option>
                        <option value="FedEx"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] === "FedEx") echo "selected"?>>FedEx</option>
                        <option value="Traineau du père noel"<?php if (isset($_POST['transporteur'])) if($_POST['transporteur'] === "Traineau du père noel") echo "selected"?>>Traineau du père noël</option>
                    </select>
                    <input type="submit" name="envoi" value="Valider">
                </form>
                <form action="cart2.php" method="post" name="formDelete">
                    <input type="submit" name="envoi" value="Vider le Panier">
                    <input type="hidden" id="DeleteAll" name="DeleteAll" value=true />
                </form>
            </div>
            <div>
            </div>
            <table>
                <tr>
                    <th>Total TTC</th>
                    <th><?php echo formatPrice(prixTotal($allProductCart)) ?></th>
                </tr>
                <tr>
                    <th>Transport</th>
                    <th><?php if (isset($_POST['transporteur'])) echo formatPrice(prixTransport($_POST['transporteur'])) ?></th>
                </tr>
                <tr>
                    <th>Total TTC + Transport</th>
                    <th><?php if (isset($_POST['transporteur'])) echo formatPrice(prixTransport($_POST['transporteur']) + prixTotal($allProductCart)) ?></th>
                </tr>
            </table>
        </div>
    <?php }?>

<?php if (isset($_POST['DeleteOneArticle'])) removeTableauPanier($_POST['FormDeleteProductKey']);
if (isset($_POST['DeleteAll'])) {
    $_SESSION = array();
}
include "footer.php"; ?>