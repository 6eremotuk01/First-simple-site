<?php
    $num = 7;

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['send']))
    {
        setcookie('numbers', $_POST['numbers']);
        header("Location: test.php");
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
        <?php include("../templates/header_t.php"); ?>
        <div class="content">
            <form method="post">
                <label>Введите числа (через запятую)</label>
                <input type="text" name="numbers">
                <input type="submit" value="Отправить" name="send">
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
