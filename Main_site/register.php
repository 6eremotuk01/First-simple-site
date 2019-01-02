<?php
    $not_empty = false;
    $in = false;

    if (isset($_POST['logout']))
    {
        SetCookie("username", "0", time() - 1);
        SetCookie("password", "0", time() - 1);
        SetCookie("name", "0", time() - 1);

        header("Location: login.php");
    }

    if (isset($_POST['login']))
        header("Location: login.php");

    if (isset($_POST['main']))
        header("Location: index.php");

    if (isset($_POST['register']))
    {
        $in = true;

        SetCookie("username", "0", time() - 1);
        SetCookie("password", "0", time() - 1);
        SetCookie("name", "0", time() - 1);

        $link = mysqli_connect('localhost', 'root', '', 'users')
            or die("Ошибка " . mysqli_error($link));

        $name = $_POST['name'];
        $username = $_POST['username'];
        $password  = $_POST['password'];

        $query = "SELECT * FROM all_users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($link, $query)
            or die("Ошибка " . mysqli_error($link));

        while ($line = mysqli_fetch_row($result))
        {
            $not_empty = true;
            SetCookie("name", $line[0]);
            SetCookie("username", $line[1]);
            SetCookie("password", $line[2]);
        }

        if (!$not_empty)
        {
            $query = "INSERT INTO all_users VALUES('$name', '$username', '$password')";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

            header("Location: login.php");
            $link->close();
            die;
        }

        $link->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Регистрация</title>
    <link rel="stylesheet" href="hello.css">
</head>
<body>
    <div class="all-content">
        <?php include("templates/header_t.php") ?>

        <div class="content">
            <form method="post" style="text-align: center;">
                <h1 style="margin: 10px 5px">Регистрация</h1>

                <table>
                    <tr>
                        <td><label>Имя</label></td>
                        <td><input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <td><label>Логин</label></td>
                        <td><input type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label>Пароль</label></td>
                        <td><input type="password" name="password" required></td>
                </table>
                <?php
                    if (isset($_COOKIE['username']))
                        echo "<button form=\"redirect\" type=\"submit\" name=\"logout\"> Выход </button>";
                    else
                        echo "<button form=\"redirect\" type=\"submit\" name=\"login\"> Вход </button>";
                ?>
                <input type="submit" name="register" value="Зарегестрироваться">
            </form>
            <?php
                if ($not_empty && $in)
                    echo "<p class=\"error\">Пользователь с такими параметрами уже существует!</p>";
            ?>
        </div>

       <?php readfile("templates/menu.php"); ?>
    </div>
    <?php readfile("templates/footer.php"); ?>
</body>
</html>
