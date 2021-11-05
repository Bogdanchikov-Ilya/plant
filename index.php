<?php
  require 'php/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
  <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>-->
  <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>-->
  <!--  <script type="text/javascript" src="scripts/instascan.min.js"></script>-->
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>-->
  <link rel="stylesheet" href="css/style.css">
  <title>QR</title>
</head>
<body>
<script>localStorage.clear()</script>
<div class="loader__wrapper">
  <div class="loader"></div>
</div>
<header class="navbar">
  <div class="container">
    <div class="header-wrapper">
      <a href="index.php" class="btn btn-outline-success">Главная</a>
      <!--        <a href="create-worker.html">Добавить сотрудника</a>-->
      <!--        <a href="create-item.html">Добавить товар</a>-->
      <a href="storekeeper.html" class="btn btn-sm btn-outline-secondary">Кладовщик</a>
    </div>
  </div>
</header>
<main>
  <div class="container">
    <div class="main-wrapper main-page">
      <div class="content">
        <a class="main-btn" href="read-worker.html"><button class="do-btn btn btn-primary btn-lg">Получить</button></a>
        <a class="main-btn" href="read-worker.html"><button class="do-btn btn btn-primary btn-lg">Сдать</button></a>
      </div>
      <!--        <video id="preview"></video>-->
      <!--        <label for="code">Отсканируйте код товара или введите вручную. В базе есть - Molotok, Otvertka, Printer</label>-->
      <!--        <form id="form" action="#">-->
      <!--          <input type="code" required id='code' placeholder="Результат сканирования">-->
      <!--          <button>Сканировать с камеры</button>-->
      <!--          <input type="submit" class="btn-form">-->
      <!--        </form>-->
      <!--        <span class="array"></span>-->
    </div>
  </div>
</main>

<!--  <script src="scripts/updateItem.js"></script>-->
<!--  <script src="scripts/scaner.js"></script>-->
<!--  <script src="scripts/send-form.js"></script>-->
<script src="scripts/setAction.js"></script>
</body>
</html>