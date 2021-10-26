<?php

require 'connect.php';

function getItem($connect) {
    $res = mysqli_query($connect, "SELECT * FROM `employees`");
    $res = mysqli_fetch_assoc($res);
    echo json_encode($res);
}
getItem($connect);