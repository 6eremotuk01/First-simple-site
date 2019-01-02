<?php
    $num = 2;

    if (isset($_POST['main']))
        header("Location: ../index.php");

    if (isset($_POST['set']))
    {
        setcookie("age", $_POST['age']);
        setcookie("city", $_POST['city']);

        $age = $_POST['age'];
        $city = $_POST['city'];
    }

    if (isset($_COOKIE['age']))
        $age = $_COOKIE['age'];

    if (isset($_COOKIE['city']))
        $city = $_COOKIE['city'];
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
                <table>
                    <tr>
                        <td><label>Name</label> </td>
                        <td><input type="text" name="name"> </td>
                    </tr>
                    <tr>
                        <td><label>Age</label> </td>
                        <td><input type="text" name="age" <?php echo "value=\"$age\"" ?>> </td>
                    </tr>
                    <tr>
                        <td><label>City</label> </td>
                        <td><input type="text" name="city" <?php echo "value=\"$city\"" ?>>  </td>
                    </tr>
                </table>

                <input type="submit" name="set" value="Set information">
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
