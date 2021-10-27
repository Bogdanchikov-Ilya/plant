<?php

require 'connect.php';

$barcode = $_REQUEST['barcode'];


$res = mysqli_query($connect, "SELECT * FROM `equipment` WHERE `barcode` = '$barcode'");
$res = mysqli_fetch_assoc($res);
echo json_encode($res);

