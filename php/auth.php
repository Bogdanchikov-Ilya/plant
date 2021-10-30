<?php
require 'connect.php';

$REALstorekeeperCode = '1234'; // потом брать из бд или менять тут

if ($_SERVER['REQUEST_METHOD'] = 'GET'){
    echo json_encode($REALstorekeeperCode);
}else{
    $storekeeperCode = $_REQUEST['storekeeperCode'];


    if($REALstorekeeperCode == $storekeeperCode){
        http_response_code(201);
        $res = ['status' => true, 'res' => 'Авторизация прошла успешно'];
        echo json_encode($res);
    } else {
        http_response_code(403);
        $res = ['status' => false, 'res' => 'Ошибка авториации'];
        echo json_encode($res);
    }
}