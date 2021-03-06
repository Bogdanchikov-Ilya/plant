<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Остатки</title>
</head>
<body>
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
        <div class="main-wrapper">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th scope="col">Название</th>
              <th scope="col">Штрих-код</th>
              <th scope="col">Ответственный</th>
              <th scope="col">Статус</th>
              <th scope="col">Количество</th>
              <th scope="col">Кто добавил</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require 'php/connect.php';
            $result = mysqli_query($connect, "SELECT * FROM `products`");

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
              <tr>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["barcode"] ?></td>
                <td><?php echo $row["owner"]?></td>
                <td><?php echo $row["status"]?></td>
                <td><?php echo $row["sum"]?></td>
                <td><?php echo $row["who_add"]?></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</main>
</body>
</html>