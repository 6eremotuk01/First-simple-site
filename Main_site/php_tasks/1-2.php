<?php
  if(isset($_POST['main'])) header("Location: ../index.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Задача №2</title>
    <link rel="stylesheet" href="../hello.css">
  </head>
  <body>
    <div class="all-content">
      <?php include("../templates/header_t.php") ?>

      <div class="content">
        <h1>Задача №2</h1>
        <h3>Задача:</h3>
        <p>
            Создайте 2 переменные числового типа. Произведите над переменными произвольное арифметическое действие и выведите его результат.
        </p>
        <h3>Выполнение задачи:</h3>
        <?php
            $a = 1;
            $b = 2;

            $c = $a + $b;
            echo "a = $a <br> b = $b";
            echo 'a + b = ', $c;
        ?>
      </div>

      <?php include("../templates/menu.php") ?>
    </div>
    <?php include("../templates/footer.php"); ?>
  </body>
</html>
