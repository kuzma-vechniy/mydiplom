
<? if(current_user()) redirect(page_url('main')) ?>

<html>
    <? $title = 'Вход' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <div class="wrap wrap__full wrap__center wrap__vcenter" >
        <form method="POST" class="form form__border">
            <legend class="form--legend">
                Вход
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
                        <input class="form--input" type="text" name="email" value="<?= $_SESSION['vars']['registration']['email'] ?>">
                    </li>
                    <li class="form--field-row">
                        <label class="form--label">Пароль</label>
                        <input class="form--input" type="password" name="password">
                    </li>
                    <li class="form--field-row">
                        <input class="btn form--button" type="submit">
                    </li>
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