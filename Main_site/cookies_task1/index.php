<?php
    $num = 1;

    if (isset($_POST['main']))
        header('Location: /index.php');

    if (isset($_POST['set']))
    {
        setcookie("bg", $_POST['bg']);
        setcookie("txt", $_POST['txt']);

        header("Location: test.php");
        die;
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
                <table>
                    <tr>
                        <td><label>Background color</label></td>
                        <td>
                            <select name="bg">
                                <option>black</option>
                                <option>white</option>
                                <option>red</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Text color</label></td>
                        <td>
                            <select name="txt">
                                <option>black</option>
                                <option>white</option>
                                <option>blue</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="set" value="Set colors"></td>
                        <td><a href="test.php">test.php</a></td>
                    </tr>
                </table>
            </form>
        </div>

        <?php readfile("../templates/menu.php"); ?>
    </div>
    <?php include("../templates/footer.php"); ?>
</body>
</html>
