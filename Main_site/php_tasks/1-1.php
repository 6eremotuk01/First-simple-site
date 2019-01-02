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
        <h1>Задача №1</h1>
        <h3>Задача:</h3>
        <p>Создайте 5 разных переменных, присвойте переменным значения разного типа. Используя gettype() выведите тип каждой переменной.</p>
        <h3>Выполнение задачи:</h3>
        <?php
            $num = "\"1-1\"";

            $param1 = true;
            $param2 = '"строка"';
            $param3 = 1;
            $param4 = 2.1;
            $param5  = array(0, 1, 2, 4, 5, 7, 7);

            echo "Переменная со значением true имеет тип ".gettype($param1) . "\n";
            echo "<br>Переменная со значением $param2 имеет тип ".gettype($param2) . "\n";
            echo "<br>Переменная со значением $param3 имеет тип ".gettype($param3) . "\n";
            echo "<br>Переменная со значением $param4 имеет тип ".gettype($param4) . "\n";
            echo "<br>Переменная со значением {";
              foreach ($param5 as $key) {
                echo "$key, ";
              }
            echo "} имеет тип ".gettype($param5) . "\n";
        ?>
      </div>
      <?php include("../templates/menu.php") ?>
    </div>
    <?php include("../templates/footer.php"); ?>
  </body>
</html>
