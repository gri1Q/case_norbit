<?php

require "config/connect.php";


$id=$_GET['id'];


$products=mysqli_query($connect,"SELECT * FROM `category` WHERE `id` = '$id'");
$products=mysqli_fetch_assoc($products);

?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
</head>

<body>
    <form action="category/update.php" method="post">
        <h1>Изменить категорию</h1>
        <p>Название категории</p>

        <input type="hidden" name="id" value="<?=$products['id']?>">
        <input type="text" name="category" value="<?=$products['category']?>"><br><br>
        <button type="submit">Изменить данную категорию</button>
    </form>
</body>

</html>