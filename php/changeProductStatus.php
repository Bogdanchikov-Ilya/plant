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
            http_response_code(201);
            $res = ['status' => true, 'resText' => 'Сотрудник ' . '«' . $workerFio . '»' . ' взял оборудование - ' .  '«' . $productName . '»'];
            return $res;
        }else{
            http_response_code(500);
            $res = ['status' => false, 'resText' => 'Ошибка'];
            return $res;
        }
    } elseif ($action == 'returnProduct'){
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

        $changeStatusRes = mysqli_query($connect, "UPDATE `products` SET `status` = 'На складе', `owner` = 'Кладовщик', `who_add` = '$workerFio' WHERE `products`.`barcode` = '$productCode';");
        if($changeStatusRes == true){
            http_response_code(201);
            $res = ['status' => true, 'resText' => 'Сотрудник ' . '«' . $workerFio . '»' . ' вернул на склад - ' .  '«' . $productName . '»'];
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