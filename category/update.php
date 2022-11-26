<?php

require "../config/connect.php";
$id=$_POST['id'];
// var_dump($id);

$category=$_POST['category'];


mysqli_query($connect,"UPDATE `category` SET `category` = '$category' WHERE `category`.`id` = '$id'");
header("location: /index.php");

?>