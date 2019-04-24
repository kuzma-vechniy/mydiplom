
<? if(current_user()) redirect(page_url('main')) ?>

<html>
    <? $title = 'Вход' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <form method="POST">
            <legend>
                Вход
            </legend>
            <fieldset>
                <ul>
                    <? foreach($msg->messages() as $message){ ?>
                        <li><?= $message ?></li>
                    <? } ?>
                </ul>
                <p>
                    <label>Email</label>
                    <input type="text" name="email" value="<?= $_SESSION['vars']['registration']['email'] ?>">
                </p>
                <p>
                    <label>Пароль</label>
                    <input type="password" name="password">
                </p>
                <p>
                    <input type="submit">
                </p>
            </fieldset>
        </form>
    </body>
</html>