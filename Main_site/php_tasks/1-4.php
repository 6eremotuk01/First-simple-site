<?php
  if(isset($_POST['main'])) header("Location: ../index.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP tasks</title>
    <link rel="stylesheet" href="../hello.css">
  </head>
  <body>
    <div class="all-content">
      <?php include("../templates/header_t.php") ?>
      <div class="content">
        <h1>Задча №4</h1>
        <h3>Задача:</h3>
        <p>Создайте 2 переменные с одинаковым типом значений. Используя тернарный оператор сравнения проведите исследование на возвращаемые результаты.</p>
        <h3>Выполнение задачи:</h3>
        <?php

            $a = true;
            $b = true;

            echo "a = $a <br> b = $b <br> a === b - ";

            if ($a === $b) echo("Абсолютно идентичные!");
        ?>
      </div>
      <?php include("../templates/menu.php") ?>
    </div>
    <?php include("../templates/footer.php"); ?>
  </body>
</html>
