<?php

require "../config/connect.php";
$id=$_GET['id'];
// var_dump($id);
mysqli_query($connect, "DELETE FROM `category` WHERE `category`.`id` = '$id';");
header("location: /index.php");