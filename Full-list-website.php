<?php include_once "header.php"?>
<?php include_once "my-function.php"?>

<?php foreach(catalog() as  $productKey => $product){
   include "item.php";
}
?>

<?php include "footer.php" ?>
