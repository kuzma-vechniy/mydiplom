
<header class="header">
    <nav class="navigation header--navigation">
        <ul class="navigation--list">
            <li class="navigation--item">
                <img src="css/img/logo.png" class="navigation--img">
            </li class="navigation--item">
            <li class="navigation--item">
            <? if (current_user()){ ?>
                    <span class="navigation--text"> <?= current_user()->email ?></span>
                    <a class="navigation--link" href="<?= page_url('logout'); ?>">Выход</a>
                <? } else { ?>
                    <a class="navigation--link" href="<?= page_url('login'); ?>" >Вход</a>
                    <a class="navigation--link" href="<?= page_url('registration'); ?>">Регистрация</a>
                <? } ?>
            </li>
            <li class="navigation--item">
                <a class="navigation--link" href="<?= page_url('help'); ?>">Помощь</a>
            </li>
            <? if(user_type() == get_constant('ADMIN')){ ?>
                <li class="navigation--item">
                    <a class="navigation--link" href="<?= page_url('admin_main'); ?>">Админка</a>
                </li>
            <? } ?>
            <li class="navigation--item">
                <span class="navigation--text">Корзина пуста</span>
            </li>
        </ul>
    </nav>
    <nav class="navigation header--navigation navigation__dark">
        <ul class="navigation--list">
            <li class="navigation--item">
                <a href="<?= page_url('popular'); ?>"  class="navigation--link" >Популярное</a> 
            </li>
            <li class="navigation--item">
                <a href="<?= page_url('discounts'); ?>"  class="navigation--link">Акции</a>
            </li>
            <li class="navigation--item">
                <a href="<?= page_url('news'); ?>"  class="navigation--link">Новости</a>
            </li>
            <li class="navigation--item">
                <a href="<?= page_url('delivery'); ?>"  class="navigation--link">Доставка и оплата</a>
            </li>
            <li class="navigation--item">
                <form class="search-form" method="GET" action="<?= page_url('main'); ?>">
                    <input placeholder="Что вы хотите найти?" class="search-form--input" type="text" name="search">
                    <input class="search-form--button" type="image" src="https://im0-tub-ru.yandex.net/i?id=4200ea30294815e51a4e6fc757043c2a&n=13">
                </form>
            </li>
        </ul>
    </nav>
</header>