<?php
require "../config/connect.php";

$category = $_POST['category'];

if (empty($category)) {
     header("location: /index.php");
} else {

    // Созданите строки в таблице категория
    mysqli_query($connect, "INSERT INTO `category` (`id`, `category`, `count`, `date`) VALUES (NULL, '$category', NULL, NULL)");

    // Возрват на главную страницу
    header("location: /index.php");
}
