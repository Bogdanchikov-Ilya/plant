<?php
require 'connect.php';
$productsArray = [];
$workersArray = [];
$products = mysqli_query($connect, "SELECT `barcode` FROM `products`");
$workers = mysqli_query($connect, "SELECT `barcode` FROM `workers`");

while ($row = mysqli_fetch_assoc($products)){
    $productsArray[] = $row['barcode'];
}
while ($row = mysqli_fetch_assoc($workers)){
    $workersArray[] = $row['barcode'];
}
echo json_encode(['workers' => $workersArray,'products' => $productsArray]);