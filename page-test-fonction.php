<?php
include "my-function.php";
session_start();
$_SESSION = array();
insertTableauPanier(10, 1);
