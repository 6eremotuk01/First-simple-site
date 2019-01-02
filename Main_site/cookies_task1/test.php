<?php
    $num = 1;

    if (isset($_POST['login']))
        header("Location: login.php");

    if (isset($_POST['main']))
        header("Location: /index.php");


    if (isset($_POST['logout']))
    {
        SetCookie("username", "0", time() - 1);
        SetCookie("password", "0", time() - 1);
        SetCookie("name", "0", time() - 1);

        header("Location: login.php");
    }

    $bg = 'white';
    $txt = 'black';

    if (isset($_COOKIE['bg']))
        $bg = $_COOKIE['bg'];

    if (isset($_COOKIE['txt']))
        $txt = $_COOKIE['txt'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Страница</title>
    <link rel="stylesheet" href="../hello.css">
</head>
<body>
    <div  class="all-content">
        <?php include("../templates/header_t.php"); ?>

        <div class="content" <?php echo "style=\"background: $bg; color: $txt; border: 1px solid $txt\""?>>
            <p>Тестовая Строка. <a href="index.php">Назад</a><p>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
