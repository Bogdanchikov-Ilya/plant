<?php
$DATABASE_NAME = 'plant';
$connect = mysqli_connect('localhost', 'root', '');

$res = mysqli_query($connect, "SHOW DATABASES");
while ($row = mysqli_fetch_assoc($res)){
    $allDB[] = $row['Database'];
}

$result = array_search($DATABASE_NAME, $allDB);
if($result !== false){
    $connect = mysqli_connect('localhost', 'root', '', $DATABASE_NAME);
} elseif($result == false){
    echo 'базы данных нет';
    mysqli_query($connect,"CREATE DATABASE `$DATABASE_NAME`");
    $connect = mysqli_connect('localhost', 'root', '', $DATABASE_NAME);
    mysqli_query($connect,"CREATE TABLE `workers` ( `id` int NOT NULL AUTO_INCREMENT, `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `surname` varchar(80) NOT NULL, `patronymic` varchar(80) NOT NULL, `barcode` varchar(255) NOT NULL, `bitrix_id` int NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `barcode` (`barcode`) ) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3");
    mysqli_query($connect,"CREATE TABLE `products` ( `id` int NOT NULL AUTO_INCREMENT, `name` varchar(150) NOT NULL, `barcode` varchar(100) NOT NULL, `owner` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `status` varchar(30) NOT NULL, `sum` int NOT NULL, `who_add` varchar(255) NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `barcode` (`barcode`), KEY `owner` (`owner`), KEY `owner_2` (`owner`), KEY `owner_3` (`owner`) ) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3" );
    echo json_encode($result);
    header ('Location: ../start.php');
}