<?php
require 'connect.php';
require 'changeProductStatus.php';

$workerCode = null;
$productCode = null;
$action = null;

if(isset($_REQUEST['worker-code']) && isset($_REQUEST['product-code'])){
    $workerCode = $_REQUEST['worker-code'];
    $productCode = $_REQUEST['product-code'];
    $action = $_REQUEST['action'];
    echo json_encode(['workerCode' => $workerCode, 'productCode' => $productCode, 'action' => $action, 'res' => changeProductStatus($connect, $action, $workerCode, $productCode)]);
} elseif (isset($_REQUEST['worker-code']) && !isset($_REQUEST['product-code'])){
    $workerCode = $_REQUEST['worker-code'];
    echo json_encode(['workerCode' => $workerCode]);
}