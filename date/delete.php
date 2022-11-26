<?php

require "../config/connect.php";
$id=$_GET['id'];
$prod=$_GET['date'];
$cat=$_GET['cat'];
// var_dump($prod);
mysqli_query($connect, "DELETE FROM `date` WHERE `date`.`id` = '$id';");

header("location: /date.php?id={$cat}&prod={$prod}");