<?php
  if(isset($_POST['main'])) header("Location: ../index.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Задача №3</title>
    <link rel="stylesheet" href="../hello.css">
  </head>
  <body>
    <div class="all-content">
      <?php include("../templates/header_t.php") ?>

      <div class="content">
        <h1>Задача №3</h1>
        <h3>Задача:</h3>
        <p>Создайте 2 переменные строкового типа. Инициализируйте переменные произвольным текстом. С помощью конкатенации объедините содержимое переменных и выведите результат.</p>
        <h3>Выполнение задачи:</h3>
        <?php
            $hello = "Hello, ";
            $world = "world";

            echo "hello = \"$hello\" <br> world = \"$world\" <br> hello + world = \"$hello_world\"";
            $hello_world = $hello . $world;

            echo($hello_world);
        ?>
      </div>

      <?php include("../templates/menu.php") ?>
    </div>
    <?php include("../templates/footer.php"); ?>
  </body>
</html>
