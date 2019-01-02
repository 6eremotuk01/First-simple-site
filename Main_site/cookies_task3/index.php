<?php
    $num = 3;

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['kir1']))
        setcookie("kir1", (integer)$_COOKIE['kir1'] += 1);

    if (isset($_POST['kir2']))
        setcookie("kir2", (integer)$_COOKIE['kir2'] += 1);

    if (isset($_POST['kir3']))
        setcookie("kir3", (integer)$_COOKIE['kir3'] += 1);

    if (isset($_POST['kir4']))
        setcookie("kir4", (integer)$_COOKIE['kir4'] += 1);

    if (isset($_POST['kir5']))
        setcookie("kir5", (integer)$_COOKIE['kir5'] += 1);

    if (isset($_POST['reset']))
    {
        setcookie("kir1", 0);
        setcookie("kir2", 0);
        setcookie("kir3", 0);
        setcookie("kir4", 0);
        setcookie("kir5", 0);

        header("refresh: 0;");
    }
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
        <?php include('../templates/header_t.php'); ?>

        <div class="content">
            <form method="post">
                <div class="tovar">
                    <img height="150px" width="150px" src="img/крипич 1.jpg">
                    <br>
                    <input type="submit" value="Купить" name="kir1"> Цена: 10р
                </div>
                <div class="tovar">
                    <img height="150px" width="150px" src="img/крипич 2.jpg">
                    <br>
                    <input type="submit" value="Купить" name="kir2"> Цена: 20р
                </div>
                <div class="tovar">
                    <img height="150px" width="150px" src="img/крипич 3.jpg">
                    <br>
                    <input type="submit" value="Купить" name="kir3"> Цена: 30р
                </div>
                <div class="tovar">
                    <img height="150px" width="150px" src="img/крипич 4.png">
                    <br>
                    <input type="submit" value="Купить" name="kir4"> Цена: 40р
                </div>
                <div class="tovar">
                    <img height="150px" width="150px" src="img/крипич 5.png">
                    <br>
                    <input type="submit" value="Купить" name="kir5"> Цена: 50р
                </div>
            </form>

            <form method="post" style="text-align: left;">
                <h3>Корзина</h3>
                <?php
                    if (isset($_COOKIE['kir1']))
                        if ($_COOKIE['kir1'] > 0)
                            echo "кирпич первый ".$_COOKIE['kir1']." шт. - ".((integer)$_COOKIE['kir1'] * 10)."руб <br>";

                    if (isset($_COOKIE['kir2']))
                        if ($_COOKIE['kir2'] > 0)
                            echo "кирпич второй ".$_COOKIE['kir2']." шт. - ".((integer)$_COOKIE['kir2'] * 20)."руб <br>";

                    if (isset($_COOKIE['kir3']))
                        if ($_COOKIE['kir3'] > 0)
                            echo "кирпич третий ".$_COOKIE['kir3']." шт. - ".((integer)$_COOKIE['kir3'] * 30)."руб <br>";

                    if (isset($_COOKIE['kir4']))
                        if ($_COOKIE['kir4'] > 0)
                            echo "кирпич четвертый ".$_COOKIE['kir4']." шт. - ".((integer)$_COOKIE['kir4'] * 40)."руб <br>";

                    if (isset($_COOKIE['kir5']))
                        if ($_COOKIE['kir5'] > 0)
                            echo "кирпич пятый ".$_COOKIE['kir5']." шт. - ".((integer)$_COOKIE['kir5'] * 50)."руб <br>";

                    if (((integer)$_COOKIE['kir1'] * 10 + (integer)$_COOKIE['kir2'] * 20 + (integer)$_COOKIE['kir3'] * 30 + (integer)$_COOKIE['kir4'] * 40 + (integer)$_COOKIE['kir5'] * 50) <= 0)
                        echo "Ваша корзина пуста";

                    echo "<h3>Итого: ".((integer)$_COOKIE['kir1'] * 10 + (integer)$_COOKIE['kir2'] * 20 + (integer)$_COOKIE['kir3'] * 30 + (integer)$_COOKIE['kir4'] * 40 + (integer)$_COOKIE['kir5'] * 50)." руб.</h3>";
                ?>
                <input type="submit" name="reset" value="Очистить корзину">
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
