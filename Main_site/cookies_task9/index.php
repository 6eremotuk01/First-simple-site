<?php
    $num = '9';

    if (isset($_POST['main']))
        header("Location: ../index.php");

    setcookie('time', time());

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
            <?php
                echo "Последний раз вы заходили ".(time() - $_COOKIE['time'])." сек. назад";
            ?>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
