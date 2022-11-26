<?php
require "config/connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>


</head>

<body>

    <table class="table shadow table-hover">
        <thead class="thead-dark">
            <tr>
                <th data-type="integer">#</th>
                <th data-type="text">Категория</th>
                <th data-type="integer">Количество</th>
                <th data-type="date">Дата</th>
                <th data-type="">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $products = mysqli_query($connect, "SELECT * FROM `category`");
            $products = mysqli_fetch_all($products);
            $i = 1;
            foreach ($products as $category) {


            ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $category[1] ?></td>
                    <td><?= $category[2] ?></td>
                    <td><?= $category[3] ?></td>
                    <td>
                        <a href="products.php?id=<?= $category[0] ?>"><button class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Смотреть</button></a>
                        <a href="update.php?id=<?= $category[0] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Изменить</button></a>
                        <a href="category/delete.php?id=<?= $category[0] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Удалить</button></a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>

        </tbody>
    </table>


    <!-- Добавление категории -->
    <form action="category/create.php" method="post">
        <h1>Добавление новой категории</h1>
        <p>Название категории</p>
        <input type="text" name="category"><br><br>

        <button type="submit">Добавить новую категорию</button>
    </form>

    <script src="js/main.js"></script>
</body>

</html>