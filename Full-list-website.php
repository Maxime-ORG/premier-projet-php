<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=e_commerce;charset=utf8', 'user-e_commerce', '_-3-nO9bt.L*6jS-');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$allProductStatement = $db->prepare('SELECT * FROM products');
$allProductStatement->execute();




include_once "header.php";
include_once "my-function.php";
session_start();
$products = $allProductStatement->fetchAll();
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    $productKey = $_POST['productKey'];
}

if (isset($_POST['quantity'])) {
    $addCartQuery= 'INSERT INTO cart (id_product, quantity) VALUES (:id_product, :quantity)';
    $addCartStatement = $db->prepare($addCartQuery);
    $addCartStatement->execute(['id_product' => $productKey+1, 'quantity' => $quantity]);
}



foreach($products as  $productKey => $product){
   include "item.php";
}

include "footer.php";


