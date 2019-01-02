<?php
    $num = 5;

    if (isset($_POST['main']))
        header("Location: ../index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link rel="stylesheet" href="../hello.css">
</head>
<body>
    <div class="all-content">
        <?php include("../templates/header_t.php") ?>
        <div class="content">
            <?php
                $birthday = $_COOKIE['date']; //день рождение

                $arr = explode('-', $birthday);
                $tm = mktime(0, 0, 0, $arr[1], $arr[2], date('Y'));

                if($tm < time())
                    $tm = mktime(0, 0, 0, $arr[1], $arr[2], date('Y')+1);

                $interval = intval(($tm-time())/86400) + 1;

                if ($interval == 365)
                    echo "Ваш день рождения сегодня! С Днем Рождения!";
                else
                    echo "До дня рождения осталось: ".$interval." дн.";
            ?>
            <a href="index.php">Назад</a>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
