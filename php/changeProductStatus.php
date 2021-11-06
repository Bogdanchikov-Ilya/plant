<?php
function changeProductStatus($connect, $action, $workerCode, $productCode) {
    if($action == 'takeProduct'){
        $worker = mysqli_query($connect, "SELECT * FROM `workers` WHERE `barcode` = '$workerCode'");
        $worker = mysqli_fetch_assoc($worker);
        if($worker == null) {
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Сотрудник с штрих-кодом ' . $workerCode . ' не найден'];
            return $res;
        }
        $workerFio = $worker['surname'] . ' ' . $worker['name'] . ' ' . $worker['patronymic'];

        $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `barcode` = '$productCode'");
        $product = mysqli_fetch_assoc($product);
        if($product == null) {
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Продукт с штрих-кодом ' . $productCode . ' не найден'];
            return $res;
        }
        $productName = $product['name'];

        $changeStatusRes = mysqli_query($connect, "UPDATE `products` SET `status` = 'Выдан', `owner` = '$workerFio' WHERE `products`.`barcode` = '$productCode';");
        if($changeStatusRes == true){
            mysqli_query($connect, "UPDATE `products` SET `sum` = `sum` - 1 WHERE `barcode` = '$productCode'");
            http_response_code(201);
            $res = ['status' => true, 'worker' => $workerFio, 'product' => $productName, 'action' => $action];
            return $res;
        }else{
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Ошибка'];
            return $res;
        }
    } elseif ($action == 'returnProduct'){

        $worker = mysqli_query($connect, "SELECT * FROM `workers` WHERE `barcode` = '$workerCode'");
        $worker = mysqli_fetch_assoc($worker);
        $workerFio = $worker['surname'] . ' ' . $worker['name'] . ' ' . $worker['patronymic'];
        $allProductsWorkers = [];
        $getAllProductsWorkers = mysqli_query($connect, "SELECT * FROM `products` WHERE `owner` = '$workerFio'");
        while ($row = mysqli_fetch_assoc($getAllProductsWorkers)){
            $allProductsWorkers[] = $row['barcode'];
        }
        $searchResult = array_search($productCode, $allProductsWorkers);
        if($searchResult == false && $searchResult !== 0){
            http_response_code(400);
            $res = ['status' => false, 'resText' => 'На сотрудника ' . $workerFio . ' не выдан этот товар'];
            return $res;
            exit();
        }

        if($worker == null) {
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Сотрудник с штрих-кодом ' . $workerCode . ' не найден'];
            return $res;
        }

        $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `barcode` = '$productCode'");
        $product = mysqli_fetch_assoc($product);
        if($product == null) {
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Продукт с штрих-кодом ' . $productCode . ' не найден'];
            return $res;
        }
        $productName = $product['name'];

        $changeStatusRes = mysqli_query($connect, "UPDATE `products` SET `status` = 'На складе', `owner` = 'Кладовщик', `who_add` = '$workerFio' WHERE `products`.`barcode` = '$productCode';");
        if($changeStatusRes == true){
            http_response_code(201);
            mysqli_query($connect, "UPDATE `products` SET `sum` = `sum` + 1 WHERE `barcode` = '$productCode'");
            $res = ['status' => true, 'worker' => $workerFio, 'product' => $productName, 'action' => $action];
            return $res;
        }else{
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Ошибка'];
            return $res;
        }
    } else {
        http_response_code(500);
        $res = ['status' => false, 'resText' => 'Ошибка - неизвестное действие'];
        echo json_encode($res);
    }
}