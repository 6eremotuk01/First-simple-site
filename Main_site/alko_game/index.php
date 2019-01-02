<?php if(isset($_POST['main'])) header("Location: ../index.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Alko game</title>
        <link rel="stylesheet" href="../hello.css">
    </head>
    <body>
        <div class="all-content">
            <?php include("../templates/header_t.php") ?>
            <div class="content">
                <h1>Игра про алкоголиков</h1>
                <h3>Условия игры</h3>
                <canvas id="canvas" width="1000" height="700"></canvas>

                <script type="text/javascript">
                    var canvas = document.getElementById('canvas');
                    if (canvas.getContext) {
                        var ctx = canvas.getContext('2d');

                        var alk1 = new Image();
                        alk1.src = "img/alk1.png";

                        var bottle = new Image();
                        bottle.src = "img/bottle.png";

                        var alk2 = new Image();
                        alk2.src = "img/alk2.png";

                        /* THE TEXTURES */
                        var start_x = 35;
                        var start_y = 100;

                        alk2.onload = function () {
                            ctx.drawImage(alk2, start_x, start_y);
                            ctx.drawImage(bottle, start_x + alk2.width, start_y + 100);
                            ctx.drawImage(alk1, start_x + alk2.width + bottle.width, start_y);
                        }

                        var basehp = 10;

                        var hp_value_fst = basehp;
                        var hp_value_scd = basehp;

                        /* HPLINE */
                        fst_hp = new Path2D();
                        scd_hp = new Path2D();

                        fst_hp.moveTo(start_x, start_y);
                        scd_hp.moveTo(start_x, start_y);

                        var hp_pos_y = 500;
                        ctx.fillStyle = 'red';
                        fst_hp.rect(start_x, start_y + hp_pos_y, 35 * hp_value_fst, 50);
                        scd_hp.rect(start_x + 580, start_y + hp_pos_y, 35 * hp_value_scd, 50);
                        ctx.fill(fst_hp);
                        ctx.fill(scd_hp);


                        /* Инидикатор жизни */
                        ctx.fillStyle = "black";
                        ctx.font = 'bold 30px sans-serif';
                        ctx.fillText("HP: " + hp_value_fst.toString() + "/" + basehp.toString(), start_x + 10, start_y + hp_pos_y + 35);
                        ctx.fillText("HP: " + hp_value_scd.toString() + "/" + basehp.toString(), start_x + 590, start_y + hp_pos_y + 35);

                        ctx.stroke();
                    }
                </script>
                <br>
                <form method="get" action="server.php">
                    <input type="text" name="number" placeholder="Введите загаданное число" style="width: 250px; text-align: center;" required>
                    <input type="submit" name="send_number" value="Отправить число">
                </form>
            </div>
            <?php include("../templates/menu.php") ?>
        </div>
        <?php include("../templates/footer.php") ?>
    </body>
</html>
