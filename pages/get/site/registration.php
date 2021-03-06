<? if(current_user()) redirect(page_url('main')) ?>

<html>
    <? $title = 'Регистрация' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <div class="wrap wrap__full wrap__center wrap__vcenter" >
        <form method="POST" class="form form__border">
            <legend class="form--legend">
                Регистрация
            </legend>
            <fieldset class="form--fieldset">
                <ul class="form--message-list">
                    <? foreach($msg->messages() as $message){ ?>
                        <li><?= $message ?></li>
                    <? } ?>
                </ul>
                <ul class="form--field-list">
                    <li class="form--field-row">
                        <label class="form--label">Email</label>
                        <input class="form--input form--input__full" type="text" name="email" value="<?= $_SESSION['vars']['registration']['email'] ?>">
                    </li>
                    <li class="form--field-row">
                        <label class="form--label">Пароль</label>
                        <input class="form--input form--input__full" type="password" name="password">
                    </li>
                    <li class="form--field-row">
                        <label class="form--label">Подтвердите пароль</label>
                        <input class="form--input form--input__full" type="password" name="password_confirmation">
                    </li>
                    <li class="form--field-row">
                        <input class="btn form--button" type="submit" value="Регистрация">
                    </li>
                    <div class="row">
                        <span>
                        Нажимая на кнопку «Регистрация», вы соглашаетесь с нашими <a href="<?= page_url("privacy") ?>">политикой конфиденциальности и политикой о куки</a>
                    </span><div>
                </ul>
                </p>
                <p>
                    
                </p>
                <p>
                    
                </p>
            </fieldset>
        </form>
        </div>
    </body>
</html>