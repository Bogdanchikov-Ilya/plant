<?php

require 'connect.php';

$name = $_POST['name'];
$barcode = $_POST['barcode'];
$sum = (int)$_POST['sum'];

$res = mysqli_query($connect, "INSERT INTO `products` (`name`, `barcode`, `owner`, `status`, `sum`, `who_add`) VALUES ('$name', '$barcode', 'Кладовщик', 'На складе', '$sum', 'Кладовщик')");
if($res == true) {
    http_response_code(201);
    $res = ['status' => true, 'text' => 'Добавлен продукт ' . $name . ' со штрихкодом - ' . $barcode];
    echo json_encode($res);
} else {
    http_response_code(500);
    $res = ['status' => false, 'text' => 'Ошибка при добавлении'];
    echo json_encode($res);
}