<?php

require "../config/connect.php";
$id = $_POST['id'];
$caty = $_POST['category_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$repair = $_POST['repair_required'];
$status = $_POST['status'];


// $history=$

$rep = mysqli_query($connect, " SELECT repair_required FROM products where `id` = '$id'");
$rep = mysqli_fetch_all($rep, MYSQLI_ASSOC);
// var_dump($rep);

$stat = mysqli_query($connect, " SELECT status FROM products where `id` = '$id'");
$stat = mysqli_fetch_all($stat, MYSQLI_ASSOC);
// var_export($stat);
$res = $repair . " " . $status;
// echo($rep[0]['repair_required']);



if ($rep[0]['repair_required'] !== $repair && $stat[0]['status'] !== $status) {
    mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `description` = '$description', `repair_required` = '$repair', `status` = '$status', `date` = NOW() WHERE `products`.`id` = '$id'");
    mysqli_query($connect, "INSERT INTO `date` (`id`, `products_id`, `product_status`, `date`) VALUES (NULL, '$id', '$res', NOW())");

} elseif ($stat[0]['status'] !== $status) {

    mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `description` = '$description', `repair_required` = '$repair', `status` = '$status', `date` = NOW() WHERE `products`.`id` = '$id'");
    mysqli_query($connect, "INSERT INTO `date` (`id`, `products_id`, `product_status`, `date`) VALUES (NULL, '$id', '$status', NOW())");
} elseif ($rep[0]['repair_required'] !== $repair) {
    mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `description` = '$description', `repair_required` = '$repair', `status` = '$status', `date` = NOW() WHERE `products`.`id` = '$id'");
    mysqli_query($connect, "INSERT INTO `date` (`id`, `products_id`, `product_status`, `date`) VALUES (NULL, '$id', '$repair', NOW())");
} 

header("location: /products.php?id=" . $caty);


// mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `description` = '$description' WHERE `products`.`id` = '$id'");
// mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `description` = '$description', `repair_required` = '$repair', `status` = '$status' WHERE `products`.`id` = '$id'");


/* $date = mysqli_query($connect, "SELECT * FROM `date` WHERE `products_id` = '$id'");
$date = mysqli_fetch_all($date, MYSQLI_ASSOC); */


// mysq($connect,"INSERT INTO `date` (`id`, `products_id`, `product_status`, `date`) VALUES (NULL, '$id', '$repair', NOW())")

// header("location: /products.php?id=".$caty);
