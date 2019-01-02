<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Game</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../hello.css" />
    <script src="main.js"></script>

    <link rel="stylesheet" href="css/main.css">
    <script src="js/game.js"></script>
</head>
<body>
    <div class="all-content">
        <?php include("../templates/header.php"); ?>

        <div class="content">
            <canvas height="600px" width="800px" id="canvas"></canvas>
            <form>
                <p align="center"><input type="button" value="Play" onclick="main();"></p>
            </form>
        </div>

        <?php include("../templates/menu.php");?>
    </div>

    <?php include("../templates/footer.php"); ?>
</body>
</html>
