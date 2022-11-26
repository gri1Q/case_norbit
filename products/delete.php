<?php

require "../config/connect.php";
$id=$_GET['id'];
$prod=$_GET['prod'];
// var_dump($id);
mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`id` = '$id'");
header("location: /products.php?id=".$prod);