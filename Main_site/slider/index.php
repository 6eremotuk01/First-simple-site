<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/hello.css">
        <title></title>

        <script type="text/javascript">
            var current_slide = 1;
            var all_slides = 2;

            function next() {
                if (current_slide + 1 > all_slides)
                    current_slide = 1;
                else
                    ++current_slide;
                change();
            }

            function prev() {
                if (current_slide - 1 < 1)
                    current_slide = all_slides;
                else
                    --current_slide;
                change();
            }

            function change() {
                for (var i = 1; i <= all_slides; i++)
                    if (i != current_slide)
                        document.getElementById('slide' + i.toString()).hidden = true;
                    else
                        document.getElementById('slide' + i.toString()).hidden = false;
            }
        </script>
    </head>
    <body>
        <div class="all-content">
            <?php include("../templates/header_t.php"); ?>
            <div class="content">
                <h1>Пример слайдера</h1>
                <p>Для просмотра его реализации нажмите клавишу F12</p>
                <div class="slider">
                    <button onclick="next();"><</button>
                    <div class="image">
                        <img src="/img/kkk.jpg" width="200px;" id="slide1">
                        <img src="/img/my_face.jpg" width="200px;" id="slide2" hidden>
                    </div>
                    <button onclick="prev();">></button>
                </div>
            </div>
            <?php include("../templates/menu.php"); ?>
        </div>
        <?php include("../templates/footer.php"); ?>
    </body>
</html>
