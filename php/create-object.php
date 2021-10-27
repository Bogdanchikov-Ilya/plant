<?php

require 'connect.php';

$name = $_POST['name'];
$barcode = $_POST['barcode'];
$owner = $_POST['owner'];
$status = $_POST['status'];
$who_add = $_POST['who_add'];

$res = mysqli_query($connect, "INSERT INTO `equipment` (`name`, `barcode`, `owner`, `status`, `who_add`) VALUES ('$name', '$barcode', '$owner', '$status', '$who_add')");
if(json_encode($res) == true) {
    http_response_code(201);
    $res = ['status' => true, 'id' => mysqli_insert_id($connect)];
} else {
    $res = ['status' => false, 'id' => mysqli_insert_id($connect)];
}

echo json_encode($res);
