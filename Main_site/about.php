<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="hello.css">
        <title>About</title>
    </head>
    <body>
        <div class="all-content">
            <?php include("templates/header.php") ?>
            <div class="content">
                <h1>Обо мне</h1>
                <div class="image" style="float: right;">
                    <img src="img/my_face.jpg" width="300px">
                </div>
                <p> Я программист С/С++, С#, PHP, JS, HTML, ну и Python немного знаю. Живу в России, Москва. </p>
                <p> Вот мой <a href="https://github.com/6eremotuk01">GitHub</a>, можете посмотреть мои небольшие работы. Ну там и большие есть, конечно. Также я есть в социальных сетях: <span><a href="https://vk.com/the_black_cap">VK</a></span>. Еще есть <a href="https://t.me/the_black_cap">Telegram</a> и <a href="https://www.instagram.com/m_shamshurin/">Instagram</a>.</p>
            </div>
            <?php include("templates/menu.php") ?>
        </div>
        <?php include("templates/footer.php") ?>
    </body>
</html>
