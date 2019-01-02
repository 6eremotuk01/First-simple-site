<div class="header">
        <p>
            <?php
                if (isset($_COOKIE['name']))
                    echo "Ваша страница, ".$_COOKIE['name'];
                else
                    echo "Вам необходимо авторизоваться";
            ?>
        </p>
        <form id='log_out' method='post'></form>
        <?php
            if (isset($_COOKIE['username']))
                echo "<button form='log_out' type='submit' name='logout'> Выход </button>";
            else
                echo "<button form='log_out' type='submit' name='login'> Вход </button>";
        ?>
</div>
