<?php if(isset($_POST['main'])) header("Location: ../index.php"); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Рисование в Canvas</title>
    <link rel="stylesheet" href="../hello.css">
  </head>
  <body>
      <div class="all-content">
          <?php include("../templates/header_t.php") ?>

          <div class="content">
                <h1>Рисунок в объекте Canvas</h1>
                <h3>Задача:</h3>
                <p>Используя элемент Cnavas, создать рисунок при помощи JavaScript.</p>
                <h3>Выполнение задачи:</h3>
                <canvas width="800" height="800" id="canvas"></canvas>
          </div>

          <script type="text/javascript">
              var canvas = document.getElementById('canvas');
              if (canvas.getContext) {
                  var ctx = canvas.getContext('2d');

                  ctx.beginPath();
                  /* ГОЛОВА */
                  head = new Path2D();
                  ctx.arc(400,400,300,0,Math.PI*2,true);
                  head.arc(400,400,300,0,Math.PI*2,true);
                  ctx.fillStyle = 'yellow';
                  ctx.fill(head);

                  /* ЛЕВЫЙ ГЛАЗ */
                  ctx.moveTo(325+75, 350);
                  ctx.arc(325, 350, 75, 0, Math.PI*2, true);

                  all_eye = new Path2D();
                  all_eye.moveTo(325+75, 350);
                  all_eye.arc(325, 350, 75, 0, Math.PI*2, true);
                  ctx.fillStyle = 'white';
                  ctx.fill(all_eye);

                  circle_eye = new Path2D();
                  circle_eye.moveTo(325, 350);
                  circle_eye.arc(300, 350, 25, 0, Math.PI*2, true);
                  ctx.fillStyle = 'black';
                  ctx.fill(circle_eye);


                  /* ПРАВЫЙ ГЛАЗ */
                  ctx.moveTo(475+75, 350);
                  ctx.arc(475, 350, 75, 0, Math.PI*2, true);

                  all_eye = new Path2D();
                  all_eye.moveTo(475+75, 350);
                  all_eye.arc(475, 350, 75, 0, Math.PI*2, true);
                  ctx.fillStyle = 'white';
                  ctx.fill(all_eye);

                  circle_eye = new Path2D();
                  circle_eye.moveTo(475, 350);
                  circle_eye.arc(450, 350, 25, 0, Math.PI*2, true);
                  ctx.fillStyle = 'black';
                  ctx.fill(circle_eye);

                  /* РОТ */
                  mouth = new Path2D();
                  ctx.moveTo(325, 450);
                  ctx.arc(400,450,75,0,Math.PI,false);
                  mouth.moveTo(325, 450);
                  mouth.arc(400,450,75,0,Math.PI,false);
                  ctx.fillStyle = 'red';
                  ctx.fill(mouth)

                  /* ЗУБЫ */
                  ctx.rect(335, 450, 130, 25);

                  teeth = new Path2D();
                  teeth.moveTo(350, 450);
                  teeth.rect(335, 450, 130, 25);
                  ctx.fillStyle = 'white';
                  ctx.fill(teeth);

                  ctx.stroke();
              }
          </script>

          <?php include("../templates/menu.php") ?>
    </div>
    <?php include("../templates/footer.php"); ?>
  </body>
</html>
