<?php
$workerCode = null;
 = null;
$action = null;

//if(isset($_REQUEST['worker-code'])){
//    $workerCode = $_REQUEST['worker-code'];
//    echo json_encode(['workerCode' => $_REQUEST['worker-code']]);
//} elseif (isset($_REQUEST['product-code'])){
//    $productCode = $_REQUEST['product-code'];
//    echo json_encode($workerCode . $productCode);
//} elseif (empty($workerCode) && empty($productCode)){
//    echo json_encode(['workerCode' => $workerCode, 'productCode' => $productCode]);
//}

if(isset($_REQUEST['worker-code']) && isset($_REQUEST['product-code'])){
    $workerCode = $_REQUEST['worker-code'];
    $productCode = $_REQUEST['product-code'];
    $action = $_REQUEST['action'];
    echo json_encode(['workerCode' => $workerCode, 'productCode' => $productCode, 'action' => $action]);
} elseif (isset($_REQUEST['worker-code']) && !isset($_REQUEST['product-code'])){
    $workerCode = $_REQUEST['worker-code'];
    echo json_encode(['workerCode' => $workerCode]);
}

function getResult($action, $workerCode, $productCode) {
    if($action == 'takeProduct'){

    } elseif ($action == 'returnProduct'){

    } else {
        echo json_encode('Ошибка, непонятное действие');
    }
}