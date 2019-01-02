<?php
    $num = 6;

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['send']))
    {
        setcookie('firstname', $_POST['firstname']);
        setcookie('lastname', $_POST['lastname']);
        setcookie('datebirth', $_POST['datebirth']);

        header("Location: test.php");
    }

    if (isset($_COOKIE['firstname']))
        $firstname = $_COOKIE['firstname'];
    if (isset($_COOKIE['lastname']))
        $lastname = $_COOKIE['lastname'];
    if (isset($_COOKIE['datebirth']))
        $datebirth = $_COOKIE['datebirth'];
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
                echo "
                    <form method=\"post\">
                        <h1>Форма информации</h1>
                        <table>
                            <tr>
                                <td><label for=\"lastname\">Имя</label></td>
                                <td><input type=\"text\" name=\"lastname\" value=\"$lastname\"></td>
                            </tr>

                            <tr>
                                <td><label for=\"firstname\">Фамилия</label></td>
                                <td><input type=\"text\" name=\"firstname\" value=\"$firstname\"></td>
                            </tr>

                            <tr>
                                <td><label for=\"datebirth\">Дата рождения</label></td>
                                <td style=\"text-align: left;\"><input type=\"date\" name=\"datebirth\" value=\"$datebirth\"></td>
                            </tr>
                        </table>
                        <input type=\"submit\" value=\"Отправить\" name=\"send\">

                    </form>
                ";
            ?>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
