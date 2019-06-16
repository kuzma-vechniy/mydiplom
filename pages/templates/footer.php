<footer class="footer">
    <section class="footer--section">
        <h2 class="footer--title">Покупателям</h2>
        <ul class="footer--list">
            <li class="footer--list-item">
                <a href="#" class="footer--link">Доставка</a>
            </li>
            <li class="footer--list-item">
                <a href="#" class="footer--link">Новости</a>
            </li>
        </ul>
    </section>
    <section class="footer--section">
        <h2 class="footer--title">
        <a href="<?= page_url("help") ?>" class="footer--link">
            Помощь
        </a>
        </h2>
        <ul class="footer--list">
            <li class="footer--list-item">
                <a href="#" class="footer--link">Как оформить заказ</a>
            </li>
            <li class="footer--list-item">
                <a href="#" class="footer--link">Способы оплаты</a>
            </li>
            <li class="footer--list-item">
                <a href="#" class="footer--link">Обмен и возврат товара</a>
            </li>
            <li class="footer--list-item">
                <a href="#" class="footer--link">Гарантийное обслуживание</a>
            </li>
        </ul>
    </section>
    <section class="footer--section">
        <h2 class="footer--title">Мы в соцсетях</h2>
        <ul class="footer--list footer--list__inline">
            <li class="footer--list-item">
                <a href="#" alt="vk" class="footer--link"><img src="css/img/vk.png" class="footer--icon"></a>
            </li>
            <li class="footer--list-item">
                <a href="#" alt="facebook" class="footer--link"><img src="css/img/facebook.png" class="footer--icon"></a>
            </li>
            <li class="footer--list-item">
                <a href="#" alt="instagramm" class="footer--link"><img src="css/img/instagram.png" class="footer--icon"></a>
            </li>
        </ul>
    </section>
    <? if(!isset($_COOKIE['confirmcookie'])){ ?>
        <section class="cookie" id="cookie_panel">
            <span>Этот сайт использует куки-файлы и другие технологии, чтобы помочь вам в навигации, а также предоставить лучший пользовательский опыт, анализировать использование наших продуктов и услуг, повысить качество рекламных и маркетинговых активностей.</span>
            <input type = "button" onclick="confirm_cookie()" value="Принять" class="cookie--button">
        </section>
    <? } ?>
</footer>