<?php
    $num = 5;

    if (isset($_POST['set']))
    {
        setcookie("date", $_POST['db']);
        header("Location: test.php");
        die;
    }

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
        <?php include("../templates/header_t.php"); ?>
        <div class="content">
            <form method="post">
                Введите дату рождения
                <input type="date" name="db">
                <input type="submit" name="set" value="Сохранить дату">
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
