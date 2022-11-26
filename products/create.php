<?php
require "../config/connect.php";



$id = $_POST['id'];
$description = $_POST['description'];
$name = $_POST['name'];
$repair = $_POST['repair_required'];

/* $prodID = (int)$_POST['products_id'];
var_dump($prodID);
$prodID = (int)$_POST['products_id'] + 1;

var_dump($prodID);
echo "<BR>"; //139
var_dump($id); //79 */

// mysql_insert_id();

// var_dump($description);
// var_dump($name);

if (!empty($name) && !empty($description) && !empty($repair)) {
    // добавление товара
    mysqli_query($connect, "INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `count`, `repair_required`, `status`, `date`) VALUES (NULL, '$id', '$name', '$description', 1, '$repair', 'На складе', NOW());");

    $lastID = mysqli_insert_id($connect);
    // Внесение записи в историю
    mysqli_query($connect, "INSERT INTO `date` (`id`, `products_id`, `product_status`, `date`) VALUES (NULL, '$lastID', 'Поступил на склад', NOW())");

    // Возрват на главную страницу
    header("location: /products.php?id=" . $id);
} else {

    echo "Заполните поле";
}
