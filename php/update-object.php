<?php

require 'connect.php';

$name = $_POST['name'];
$barcode = $_POST['barcode'];
$owner = $_POST['owner'];
$status = $_POST['status'];
$who_add = $_POST['who_add'];

$res = mysqli_query($connect, "UPDATE `equipment` SET `status` = '$status', `owner` = '$owner' WHERE `equipment`.`barcode` = '$barcode';");
if(json_encode($res) == true) {
    http_response_code(201);
    $res = ['status' => true, 'id' => mysqli_insert_id($connect)];
} else {
    $res = ['status' => false, 'id' => mysqli_insert_id($connect)];
}

echo json_encode('update');