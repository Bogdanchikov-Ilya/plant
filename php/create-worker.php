<?php

require 'connect.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$barcode = $_POST['barcode'];
$bitrixId = (int)$_POST['bitrixId'];

$res = mysqli_query($connect, "INSERT INTO `employees` (`name`, `surname`, `patronymic`, `barcode`, `bitrix_id`) VALUES ('$name', '$surname', '$patronymic', '$barcode', '$bitrixId')");
http_response_code(201);
if(json_encode($res) == true) {
    http_response_code(201);
    $res = ['status' => true, 'id' => mysqli_insert_id($connect)];
} else {
    $res = ['status' => false, 'id' => mysqli_insert_id($connect)];
}

echo json_encode($res);
