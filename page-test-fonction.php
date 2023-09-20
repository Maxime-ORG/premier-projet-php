<?php
include "my-function.php";
require_once ("item2.php");

$itemTemp = new Item2("un super génial ITEM.....", 105, "https://m.media-amazon.com/images/I/71u7hs+DZPL.jpg", 1000, 10);
$itemTemp->displayItem();
