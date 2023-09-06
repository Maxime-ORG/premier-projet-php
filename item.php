<?php include "header.php"?>
<?php include "multidimensional-catalog.php"?>

<div class="colonneCentrale">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $products[0]["picture_url"] ?> alt="imageProduit">
    </div>
    <div class="colonneCentrale-colonne2">
        <div class = "alligne_colonne">
            <H2><?php echo $products[0]["name"] ?></H2>
            <p> prix : <?php echo $products[0]["price"]/100 ?> € </p>
            <p> remise : <?php echo $products[0]["discount"] ?> % </p>
            <p> poids : <?php echo $products[0]["weight"] ?> G </p>
            <button class="ajouterPanierBouton" type="button">Ajouter au Panier</button>
        </div>
    </div>
</div>

<?php include "footer.php"?>
