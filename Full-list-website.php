<?php include_once "header.php"?>
<?php include_once "my-function.php"?>
<?php session_start(); ?>
<?php if (isset($_POST['quantity'])) insertTableauPanier($_POST['quantity'], $_POST['productKey']) ?>


<?php foreach(catalog() as  $productKey => $product){
   include "item.php";
}
?>

<?php include "footer.php" ?>
