<?php
require 'connect.php';
$code = $_REQUEST['code'];
$user = mysqli_query($connect, "SELECT * FROM `workers` WHERE `barcode` = '$code'");
$user = mysqli_fetch_assoc($user);
$fio = $user['surname'] . ' ' . $user['name'] . ' ' . $user['patronymic'];
$res = [];
if($fio == true){
//    http_response_code(201);
//    $res = ['status' => true, 'resText' => $fio];
//    echo json_encode($res);
    $total = mysqli_query($connect, "SELECT * FROM `products` WHERE `owner` = '$fio'");
    while ($row = mysqli_fetch_assoc($total)){
        $res[] = $row['name'];
    }
    $res = implode(',', $res);
    http_response_code(201);
    $result = ['status' => true, 'resText' => 'На сотрудника ' . $fio . ' выдано: ' . $res];
    echo json_encode($result);
} else{
    http_response_code(500);
    $res = ['status' => false, 'resText' => 'Сотрудник не найден'];
    echo json_encode($res);
}


//$res = mysqli_query($connect, "SELECT * FROM  `products` WHERE `owner` = '$fio'");