<?php
require "config/connect.php";






$idCategory = (int)$_GET['id'];
// var_dump($idCategory);


$categories = mysqli_query($connect, "SELECT * FROM `category` WHERE `id` = '$idCategory'");
$categories = mysqli_fetch_assoc($categories);
// var_dump($categories);

$products = mysqli_query($connect, "SELECT * FROM `products` WHERE `category_id` = '$idCategory'");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);
// var_dump($products);



$sum = mysqli_query($connect, "SELECT SUM(count) FROM products WHERE `category_id`='$idCategory';");
$sum = mysqli_fetch_assoc($sum);

$sum = implode("", $sum);

if (!empty($sum)) {

    $count = mysqli_query($connect, "UPDATE `category` SET `count` = '$sum' WHERE `category`.`id` = '$idCategory'");
}




$date = mysqli_query($connect, "SELECT * FROM `products` ORDER BY `products`.`date` DESC");
$date = mysqli_fetch_assoc($date);
if (!empty($date)) {
    $lastDate = mysqli_query($connect, "UPDATE `category` SET `date` = '$date[date]' WHERE `category`.`id` = '$idCategory'");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
</head>

<body>
    <a href="index.php">&laquo; Назад</a>
    <h2>Категория:<?= $categories['category'] ?></h2>
    <table class="table shadow table-hover">
        <thead class="thead-dark">
            <tr>
                <th data-type="integer">#</th>
                <th data-type="text">Название</th>
                <th data-type="text">Описание</th>
                <th data-type="integer">Количество</th>
                <th data-type="integer">Требуется ремонт</th>
                <th data-type="date">Статус</th>
                <th data-type="date">Дата</th>
                <th>Действия</th>

            </tr>
        </thead>

        <tbody>


            <?php


            $i = 1;
            foreach ($products as $product) {

            ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['count'] ?></td>
                    <td><?= $product['repair_required'] ?></td>
                    <td><?= $product['status'] ?></td>
                    <td><?= $product['date'] ?></td>
                    <td>
                        <a href="date.php?id=<?= $product['id'] ?>&prod=<?= $product['category_id'] ?>"><button class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Смотреть</button></a>
                        <a href="updateProducts.php?id=<?= $product['id'] ?>&prod=<?= $product['category_id'] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Изменить</button></a>
                        <a href="/products/delete.php?id=<?= $product['id'] ?>&prod=<?= $product['category_id'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Удалить</button></a>

                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>

    </table>

    <!-- Добавление нового товара -->
    <form action="products/create.php" method="post">
        <h1>Добавление новой категории</h1>
        <input type="hidden" name="products_id" value="<?= $product['id'] ?>">
        <input type="hidden" name="id" value="<?= $categories['id'] ?>">
        <p>Название товара</p>
        <input type="text" name="name" placeholder="Название товара"><br><br>
        <p>Описание</p>
        <textarea name="description" placeholder="Описание товара"></textarea> <br><br>
        <p>Ремонт</p>
        <input type="text" name="repair_required" placeholder="Нужен ремонт?"><br><br>
        <button type="submit">Добавить новый товар</button>
    </form>


    <script src="js/main.js"></script>

</body>

</html>