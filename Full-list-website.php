<?php include_once "header.php"?>
<?php include_once "my-function.php"?>
<?php include_once "multidimensional-catalog.php"?>


<?php foreach($products as  $productKey => $product){
   include "item.php";
}
?>

<?php include "footer.php" ?>
