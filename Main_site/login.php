<?php
    $log_in = false;
    $in = false;

    if (isset($_POST['redirect']))
        header("location: register.php");

    if (isset($_POST['main']))
        header("location: index.php");

    if (isset($_POST['sign_in']) || (isset($_COOKIE['username']) && isset($_COOKIE['password'])))
    {
        $in = true;

        $link = mysqli_connect('localhost', 'root', '', 'users')
            or die("Ошибка " . mysqli_error($link));

        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        else
        {
            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];
        }

        $query = "SELECT * FROM all_users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($link, $query)
            or die("Ошибка " . mysqli_error($link));

        while ($line = mysqli_fetch_row($result))
        {
            $log_in = true;

            SetCookie("name", $line[0]);
            SetCookie("username", $line[1]);
            SetCookie("password", $line[2]);
        }

        if ($log_in)
            header("Location: index.php");

        $link->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Вход</title>
    <link rel="stylesheet" href="hello.css">
</head>
<body>
    <div class="all-content">
        <?php include("templates/header_t.php") ?>
        <div class="content">
            <form method="post">
                <table>
                    <h1 style="margin: 3px;">Вход</h1>
                    <tr>
                        <td><label>Логин</label></td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label>Пароль</label></td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                </table>
                <button form="redirect" type="submit" name="redirect">Регистрация</button>
                <input type="submit" name="sign_in" value="Войти">
            </form>
            <?php
                if (!$log_in && $in)
                    echo "<p class=\"error\">Неверный логин или пароль!</p>";
            ?>
        </div>

        <?php readfile("templates/menu.php"); ?>
    </div>
    <?php readfile("templates/footer.php"); ?>
</body>
</html>
