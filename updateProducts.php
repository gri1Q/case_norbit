<?php

require "config/connect.php";


$id=$_GET['id'];
$prod=$_GET['prod'];
// var_dump($id);

$products = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
$products = mysqli_fetch_assoc($products);


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
</head>

<body>
    <form action="products/update.php" method="post">
        <h1>Изменить товар</h1>
        <p>Название товара</p>



        <input type="hidden" name="id" value="<?=(int) $products['id'] ?>">
        <input type="hidden" name="category_id" value="<?= (int)$products['category_id'] ?>">
        <input type="text" name="name" value="<?= $products['name'] ?>"><br><br>
        <p>Описание</p>
        <input type="text" name="description" value="<?= $products['description'] ?>"><br><br>
        <p>Ремонт</p>
        <input type="text" name="repair_required" value="<?= $products['repair_required'] ?>"><br><br>
        <p>Статус</p>
        <input type="text" name="status" value="<?= $products['status'] ?>"><br><br>
        <button type="submit">Изменить товар</button>
    </form>


</body>

</html>