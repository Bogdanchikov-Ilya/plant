<?php
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  require 'php/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--  <script>-->
<!--    window.onload = function () {-->
<!--      async function getAppStatus() {-->
<!--        const res = fetch('first_start.php')-->
<!--      }-->
<!--    }-->
<!--  </script>-->
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body class="first-start-page">
  <div class="container">
    <div class=" first-start-text-block">
      <p>База данных для работы сайта не обнаружена. Нажмите кнопку ниже, чтобы завершить настройку</p>
        <a class="btn btn-primary" href="index.php">Первый запуск</a>
    </div>
  </div>
</body>
</html>