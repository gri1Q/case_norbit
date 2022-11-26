<?php
require "config/connect.php";



$id = (int) $_GET['id'];

$prodId = $_GET['prod'];

$products = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
$products = mysqli_fetch_assoc($products);

// var_dump($products);





$date = mysqli_query($connect, "SELECT * FROM `date` WHERE `products_id` = '$id'");
$date = mysqli_fetch_all($date, MYSQLI_ASSOC);
// var_dump($date);



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
    <a href="products.php?id=<?= $prodId ?>">&laquo; Назад</a>
    <h2>История:<?= $products['name'] ?></h2>
    <table class="table shadow table-hover">
        <thead class="thead-dark">
            <tr>
                <th data-type="integer">#</th>
                <th data-type="text">История</th>
                <th data-type="date">Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;


            foreach ($date as $dat) {


            ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $dat['product_status'] ?></td>
                    <td><?= $dat['date'] ?></td>

                    <td>

                        <a href="/date/delete.php?id=<?= $dat['id'] ?>&date=<?= $_GET['prod'] ?>&cat=<?= $dat['products_id'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Удалить</button></a>

                    </td>
                </tr>
            <?php
                $i++;
            }

            ?>
        </tbody>
    </table>

    <form action="date/create.php" method="post">

        <input type="hidden" name="products_id" value="<?= $prodId ?>">
        <h1>Добавить историю товара</h1>
        <input type="hidden" name="id" value="<?= (int) $products['id'] ?>">
        <p>История</p>
        <input type="text" name="location"><br><br>

        <button type="submit">Добавить новое местоположение</button>
    </form>



    <script src="js/main.js"></script>

</body>

</html>