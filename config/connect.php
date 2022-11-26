<?php
$host= 'localhost';

$user='kosoramo_case';
$pass='Root12';
$nameDB='kosoramo_case';


// $host= 'localhost';

// $user='root';
// $pass='root';
// $nameDB='case';

$connect = mysqli_connect($host,$user, $pass, $nameDB);



if(!$connect){
    echo "Eror";
}