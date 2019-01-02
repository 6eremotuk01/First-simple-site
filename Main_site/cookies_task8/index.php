<?php
    $num = 8;

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['reset']))
    {
        setcookie("times", "0");
        header("Refresh: 0");
    }
    else
    {
        setcookie("times", (integer)$_COOKIE['times'] += 1);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link rel="stylesheet" href="../hello.css">
    <head>
        <meta charset="utf-8" />
        <title>Page Title</title>
        <link rel="stylesheet" href="../hello.css">
    </head>
</head>
<body>

    <div class="all-content">
        <?php include("../templates/header_t.php"); ?>
        <div class="content">

            <form method="post">
                <?php
                    if($_COOKIE['times'] - 1 <= 0)
                        echo "Вы еще не обновляли страницу";
                    else
                        echo "Вы обновили страницу ".($_COOKIE['times'] - 1)." раз";
                ?>
                <input type="submit" value="Очистить счетчик" name="reset">
                <input type="submit" value="Обновить страницу" name="refresh">
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
