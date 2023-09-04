<?php
$lienImage1 = "./.image/gyroscope-scientifique.jpeg";
$lienImage2 = "./.image/gyroscope-scientifique.jpeg";
$nomProduit = "Gyroscope";
$prixProduit = "35 €";

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css'>
    <title>page-produit</title>
</head>
<body>
    <div class="header">
        <a> Trouver un magasin </a>
        <a> | </a>
        <a> Aide </a>
        <a> | </a>
        <a> Nous rejoindre </a>
        <a> |</a>
        <a> S'identifier </a>
    </div>
    <div class="colonneCentrale">
        <div class="colonneCentrale-colonne1">
            <img class="imageProduit" src= <?php echo $lienImage1 ?> alt="imageProduit">
        </div>
        <div class="colonneCentrale-colonne2">
            <div class = "alligne_colonne">
            <H2><?php echo $nomProduit ?></H2>
            <p> <?php echo $prixProduit ?> </p>
            </div>
        </div>


    </div>

    <div class="footer">
        <a> à propos de </a>
        <a> | </a>
        <a> Guides </a>
        <a> | </a>
        <a> Conditions d'utilisation</a>
        <a> | </a>
        <a> Conditions générales de ventes </a>
        <a> | </a>
        <a> Mentions légales </a>
        <a> | </a>
        <a> Politique de confidentialité et de cookies</a>
        <a> | </a>
        <a> Paramètres des cookies </a>
    </div>
</body>

</html>


