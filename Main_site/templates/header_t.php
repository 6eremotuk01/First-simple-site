<div class="header">
        <p>
            <?php
                if (isset($_COOKIE['name']))
                    echo "Вы вошли как ".$_COOKIE['name'];
                else
                    echo "Вам необходимо авторизоваться";
            ?>
        </p>
        <form id="redirect" method="post"></form>
        <button form="redirect" type="submit" name="main"> На главную </button>
</div>
