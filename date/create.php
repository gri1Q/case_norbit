<?php
require "../config/connect.php";



$id = $_POST['id'];
// var_dump($id);
$prodId=$_POST['products_id'];
$location = $_POST['location'];



// var_dump($description);
// var_dump($name);

if (empty($location)) {
    echo "Заполните поле";
} else {

    // добавление товара
    mysqli_query($connect, "INSERT INTO `date` (`id`, `products_id`, `product_status`, `date`) VALUES (NULL, '$id', '$location', NOW())");

    // Возрват на главную страницу
    header("location: /date.php?id=" . $id."&prod=".$prodId);
}
