<?php include "header.php"?>

<div class="colonneCentrale">
    <div class="colonneCentrale-colonne1">
        <img class="imageProduit" src= <?php echo $lienImage1 ?> alt="imageProduit">
    </div>
    <div class="colonneCentrale-colonne2">
        <div class = "alligne_colonne">
            <H2><?php echo $nomProduit ?></H2>
            <p> <?php echo $prixProduit ?> </p>
            <button class="ajouterPanierBouton" type="button">Ajouter au Panier</button>
        </div>
    </div>
</div>

<?php include "footer.php"?>
