<?php $num = "\"Сортировка массива\""; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Задание по сортировке</title>

    <link rel="stylesheet" href="../hello.css">

    <script>
      function hide_all()
      {
          document.getElementById('order2').hidden =
            document.getElementById('sort2').hidden = !document.getElementById('sort_two-fields').checked;
      }
    </script>
</head>
<body>
  <div class="all-content">
    <?php include ("../templates/header_t.php")?>

    <div class="content">
      <h1>Сортировка массива</h1>
      <h3>Задача:</h3>
      <p>
          Дан исходный массив: <br>
      </p>
      <pre>
        $peoples = array(
          'a1' => array('id'=>'1', 'age'=>'16', 'gender'=>'m', 'login'=>'Вася'),
          'a2' => array('id'=>'2', 'age'=>'18', 'gender'=>'m', 'login'=>'Петя'),
          'a3' => array('id'=>'3', 'age'=>'20', 'gender'=>'g', 'login'=>'Катя'),
          'a4' => array('id'=>'4', 'age'=>'20', 'gender'=>'m', 'login'=>'Миша'),
          'a5' => array('id'=>'5', 'age'=>'12', 'gender'=>'g', 'login'=>'Маша'),
          'a6' => array('id'=>'6', 'age'=>'44', 'gender'=>'g', 'login'=>'Галя'),
          'a7' => array('id'=>'7', 'age'=>'45', 'gender'=>'m', 'login'=>'Макс'),
          'a8' => array('id'=>'8', 'age'=>'20', 'gender'=>'m', 'login'=>'Илья'),
          'a9' => array('id'=>'9', 'age'=>'20', 'gender'=>'g', 'login'=>'Мария'),
        );</pre>
      <p>
          Необходимо сформировать таблицу и возможность ее сортировки по двум столбцам.
      </p>
      <h3>Выполнение задачи:</h3>
      <form method="post">
        <p>Установка параметров сортировки</p>

        <input type="checkbox" onclick="hide_all();" name="sort_two-fields" id="sort_two-fields" value="">
        <label for="sort_two-fields">Сортировка по 2 полям</label>

        <table>
          <tr>
            <td>
              <select id="sort1" name="sort1">
                <option value="id1">ID</option>
                <option value="age1">Возраст</option>
                <option value="gender1">Гендер</option>
                <option value="login1">Логин</option>
              </select>
            </td>
            <td>
              <select id="order1" name="order1">
                <option value="SORT_ASC">По возрастанию</option>
                <option value="SORT_DESC">По убыванию</option>
              </select>
            </td>
          </tr>

          <tr>
            <td>
              <select id="sort2" name="sort2" hidden>
                <option value="id2">ID</option>
                <option value="age2">Возраст</option>
                <option value="gender2">Гендер</option>
                <option value="login2">Логин</option>
              </select>
            </td>
            <td>
              <select id="order2" name="order2" hidden>
                <option value="SORT_ASC">По возрастанию</option>
                <option value="SORT_DESC">По убыванию</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
              <input type="submit" name="btnSort" value="Отправить">
            </td>
          </tr>
        </table>

      </form>

      <FORM>
        <?php
        $peoples = array(
          'a1' => array('id'=>'1', 'age'=>'16', 'gender'=>'m', 'login'=>'Вася'),
          'a2' => array('id'=>'2', 'age'=>'18', 'gender'=>'m', 'login'=>'Петя'),
          'a3' => array('id'=>'3', 'age'=>'20', 'gender'=>'g', 'login'=>'Катя'),
          'a4' => array('id'=>'4', 'age'=>'20', 'gender'=>'m', 'login'=>'Миша'),
          'a5' => array('id'=>'5', 'age'=>'12', 'gender'=>'g', 'login'=>'Маша'),
          'a6' => array('id'=>'6', 'age'=>'44', 'gender'=>'g', 'login'=>'Галя'),
          'a7' => array('id'=>'7', 'age'=>'45', 'gender'=>'m', 'login'=>'Макс'),
          'a8' => array('id'=>'8', 'age'=>'20', 'gender'=>'m', 'login'=>'Илья'),
          'a9' => array('id'=>'9', 'age'=>'20', 'gender'=>'g', 'login'=>'Мария'),
        );
        echo "<div><br><p><b>Изначальный массив:<p></b><table class='border'>";
        echo "<tr><th>ID</th><th>AGE</th><th>GENDER</th><th>LOGIN</th></tr>";
        foreach($peoples as $key => $items) {
          echo '<tr>';
          foreach($items as $k => $value) {
            echo "<td>$value </td>" ;
          }
          echo "</tr>";
        }
        echo "</table></div>";
        ?>

        <?php
        function super_sort($array, $field1, $order1 = SORT_ASC, $field2 = null, $order2 = SORT_ASC)
        {
          if (!empty($field2)) { $isTwoField = true; }

          foreach($array as $key=>$value) {
            $one_field[$key] = $value[$field1];
            if ($isTwoField) $two_field[$key] = $value[$field2];
          }

          if ($isTwoField) {
            array_multisort($two_field, $order2, $one_field, $order1, $array);
          } else {
            array_multisort($one_field, $order1, $array);
          }

          echo "<div><br><b><p>Отсортированный массив:</p></b><table class='border'>";
          echo "<tr><th>ID</th><th>AGE</th><th>GENDER</th><th>LOGIN</th></tr>";
          foreach($array as $key => $items) {
            echo '<tr>';
            foreach($items as $k => $value) {
              echo "<td>$value </td>" ;
            }
            echo "</tr>";
          }
          echo "</table></div>";
          return ;
        }

        if (isset($_POST['btnSort'])) {

          $order1 = $_POST['order1'];
          $field1 = $_POST['sort1'];

          if ($order1 == 'SORT_DESC') {
            $sort_order1 = SORT_DESC;
          } else if ($order1 == 'SORT_ASC') {
            $sort_order1 = SORT_ASC;
          }

          if ($field1 == 'id1') { $sort_field1 = 'id'; }
          else if ($field1 == 'age1') { $sort_field1 = 'age'; }
          else if ($field1 == 'gender1') { $sort_field1 = 'gender'; }
          else if ($field1 == 'login1') { $sort_field1 = 'login'; }

          if (isset($_POST['sort_two-fields'])) {
            $order2 = $_POST['order2'];
            $field2 = $_POST['sort2'];

            if ($order2 == 'SORT_DESC') {
              $sort_order2 = SORT_DESC;
            } else if ($order2 == 'SORT_ASC') {
              $sort_order2 = SORT_ASC;
            }

            if ($field2 == 'id2') { $sort_field2 = 'id'; }
            else if ($field2 == 'age2') { $sort_field2 = 'age'; }
            else if ($field2 == 'gender2') { $sort_field2 = 'gender'; }
            else if ($field2 == 'login2') { $sort_field2 = 'login'; }

            super_sort($peoples, $sort_field2, $sort_order2, $sort_field1, $sort_order1);

          } else {

            super_sort($peoples, $sort_field1, $sort_order1);

          }
        }
        ?>
      </FORM>
  </div>
  <?php include ("../templates/menu.php")?>
</div>

<?php include("../templates/footer.php"); ?>
</body>
</html>
