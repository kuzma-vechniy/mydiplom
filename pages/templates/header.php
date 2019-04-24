
<header>
    <nav>
        <ul>
            <li>
                <img>
            </li>
            <li>
            <? if (current_user()){ ?>
                    <span> <?= current_user()->email ?></span>
                    <a href="<?= page_url('logout'); ?>">Выход</a>
                <? } else { ?>
                    <a href="<?= page_url('login'); ?>" >Вход</a>
                    <a href="<?= page_url('registration'); ?>">Регистрация</a>
                <? } ?>
            </li>
            <li>
                <a href="<?= page_url('help'); ?>">Помощь</a>
            </li>
            <? if(user_type() == get_constant('ADMIN')){ ?>
                <li>
                    <a href="<?= page_url('admin_main'); ?>">Админка</a>
                </li>
            <? } ?>
            <li>
                <span>Корзина пуста</span>
            </li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li>
                <a href="<?= page_url('popular'); ?>">Популярное</a> 
            </li>
            <li>
                <a href="<?= page_url('discounts'); ?>">Акции</a>
            </li>
            <li>
                <a href="<?= page_url('news'); ?>">Новости</a>
            </li>
            <li>
                <a href="<?= page_url('delivery'); ?>">Доставка и оплата</a>
            </li>
            <li>
                <form method="GET" action="<?= page_url('main'); ?>">
                    <input type="text" name="search">
                    <input type="submit">
                </form>
            </li>
        </ul>
    </nav>
</header>