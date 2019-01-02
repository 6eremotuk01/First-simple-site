<?php
    $num = 6;

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['edit']))
        header("Location: index.php");
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
                $firstname = $_COOKIE['firstname'];
                $lastname  = $_COOKIE['lastname'];
                $datebirth = explode('-', $_COOKIE['datebirth']);

                echo "
                    <form method=\"post\">
                        <h1>Результаты теста</h1>
                        <table>
                            <tr>
                                <td style=\"text-align: left;\"> Имя - $lastname </td>
                            </tr>
                            <tr>
                                <td style=\"text-align: left;\"> Фамилия - $firstname </td>
                            </tr>
                            <tr>
                                <td style=\"text-align: left;\"> День рождения - ".$datebirth[2].".".$datebirth[1].".".$datebirth[0]." </td>
                            </tr>
                        </table>
                        <input type=\"submit\" name=\"edit\" value=\"Изменить результаты теста\">
                    </form>
                ";
            ?>

        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
