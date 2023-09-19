<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=e_commerce;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once "header.php";
include_once "my-function.php";
session_start();
$products = catalog();

if (isset($_POST['quantity']) and isset($_SESSION['tableauPanier'])) {
    insertTableauPanier($_POST['quantity'], $_POST['productKey'], $_SESSION['tableauPanier']);
} elseif (isset($_POST['quantity']) ) {
    $_SESSION['tableauPanier'] = array();
    insertTableauPanier($_POST['quantity'], $_POST['productKey'], $_SESSION['tableauPanier']);
}



foreach($products as  $productKey => $product){
   include "item.php";
}

include "footer.php";


