<html>
    <? $title = 'Регистрация' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <form method="POST">
            <legend>
                Регистрация
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
                    <label>Подтверждение пароля</label>
                    <input type="password" name="password_confirmation">
                </p>
                <p>
                    <input type="submit">
                </p>
            </fieldset>
        </form>
    </body>
</html>