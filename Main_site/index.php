<?php
    if (isset($_POST['login']))
        header("Location: login.php");

    if (isset($_POST['logout']))
    {
        SetCookie("username", "0", time() - 1);
        SetCookie("password", "0", time() - 1);
        SetCookie("name", "0", time() - 1);

        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Страница</title>
    <link rel="stylesheet" href="hello.css">
</head>
<body>
    <div class="all-content">
        <?php include("templates/header.php"); ?>

        <div class="content">
            <h1>Добро пожаловать на мой первый нормальный сайт</h1>
            <div class="image" style="float: right;">
                <img src="img/kkk.jpg" width="300px">
            </div>
            <p>Данный сайт сделан в рамках курса по предмету "Сайтостроение". И является доказательством того, что, я не ходя на пары, готовился дома и сдавал все работы. Если вы не видели все работы, то милости прошу полазить по меню сайта.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Приятного просмотра :)</p>
        </div>

        <?php include("templates/menu.php"); ?>
    </div>

    <?php include("templates/footer.php"); ?>
</body>
</html>
