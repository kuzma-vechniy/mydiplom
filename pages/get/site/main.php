<? $categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result(); ?>
<? 
$products = $db->from('products')->order('order_count desc')->limit(4)->execute()->result();

    foreach($categories as $category){
        $category->categories = $db->from('categories')->where(['category_id' => $category->id])->execute()->result();
    }
?>

<html>
    <? $title = 'Главная' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>

<main class="wrap wrap__fixed">
    <section class="row row__space-between">
        <aside class="category row--item">
            <h2 class="category--title">
                Категории
            </h2>
            <ul class="category--list">
                <? foreach($categories as $category){?>
                    <li class="category--item">
                        <a class="category--link" href="<?= page_url('category', ['category_id' => $category->id]) ?>">
                            <?= $category->name ?>
                        </a>
                        <? if($category->categories != []){ ?>
                            <article class="category category__sub">
                                <ul class="category--list">
                                    <? foreach($category->categories as $sub_category){ ?>
                                        <li class="category--item">
                                            <a class="category--link" href="<?= page_url('category', ['category_id' => $sub_category->id]) ?>">
                                                <?= $sub_category->name ?>
                                            </a>
                                        </li>
                                    <? } ?>
                                </ul>
                            </article>
                        <? } ?>
                    </li>
                <? } ?>            
            </ul>     
        </aside>
        <div class="col">
            <article id="slider" class="slider">
            <button id="left" class="slider--left" onclick="scrolLeft()">◀</button>
            <a id="href" href="#">
            <img src="" alt="" id="image" class="slider--image"> 
            </a>
            <button id="right" class="slider--right" onclick="scrolRight()">▶</button>
            </article>
            <script type="text/javascript" src="js/slider.js"></script>
        </div>        
    </section>
    <section class="col">
        <article class="content">
            <h2 class="content--title" id="popular">
                Популярное
            </h2>
            <ul class="content--list">
                <? foreach($products as $product){ ?>
                    <li class="content--item">
                        <article class="product">
                            <img class="product--image" src="<?= $product->img ?>">
                            <h3 class="product--title">
                                <a href="<?= page_url('product', ['product_id' => $product->id]); ?>">
                                    <?= $product->name ?>
                                </a>
                            </h3>
                            <span class="product--price"><?= $product->price ?> руб.</span>
                            <div class="product--buttons">
                                <input type="button" onclick="addToBascket(<?= $product->id ?>,<?= $product->price ?>)" value="В корзину" class="product--button">
                                <a href="#"><img src="css/img/cards.png"class="product--card"></a>
                            </div>
                        </article>
                    </li>
                <? } ?>
            </ul>
        </article>
        <article class="content">
            <h2 class="content--title" id="news">Новости</h2>
            <ul class="content--list">
                <li class="content--item">

                    <article class="news">
                        <header class="news--header">
                            <img src="css/img/calendar.png" class="news--image">
                            <span class="news--date">22/11/2018</span>
                        </header>
                        <main class="news--main">
                            <h3 class="news--title">Дизайн скоро будет готов</h3>
                            <p class="news--text">
                                Задача организации, в особенности же рамки
                                и место обучения кадров представляет собой интересный
                                эксперимент проверки системы обучения кадров, соответствует
                                насущным потребностям.
                                
                            </p>
                        </main>
                    </article>
                </li>
                    <li class="content--item">

    <article class="news">
        <header class="news--header">
            <img src="css/img/calendar.png" class="news--image">
            <span class="news--date">22/11/2018</span>
        </header>
        <main class="news--main">
            <h3 class="news--title">Дизайн скоро будет готов</h3>
           
            <p class="news--text">
                Задача организации, в особенности же рамки
                и место обучения кадров представляет собой интересный
                эксперимент проверки системы обучения кадров, соответствует
                насущным потребностям.
            </p>
        </main>
    </article>
    </li>
            </ul>
        </article>

        <article class="content">
            <h2 class="content--title" id="delivery">Доставка и оплата</h2>
            <p class="content--text">
                Закажите сейчас — заберите в удобном для Вас магазине или пункте выдачи заказа. 
            </p>
            <ul class="content--text-list">
                <li>
                Мы доставим заказ как можно скорее в удобный для вас пункт выдачи. Дата доставки уточняется при оформлении.
                </li>
                <li>
                Подтверждение по смс оповестит Вас о том, что заказ прибыл в выбранный пункт самовывоза.
                </li>
                <li>
                Ожидание заказа в пункте выдачи составляет 3 дня с момента прибытия. 
                </li>
                <li>
                Стоимость доставки до пункта самовывоза зависит от удаленности и указана в карточке товара и в корзине на этапе оформления товара
                </li>
                <li>
                Заказы стоимостью свыше 200 000 рублей доставляются только после предварительной оплаты. 
                </li>
                <li>
                Заказы, оформленные на юридическое лицо, стоимостью свыше 30 000 рублей доставляются бесплатно. 
                </li>
            </ul>
        </article>
    </section>
    <article class="feedback">
        <div class="feedback--content">
            <h2 class="feedback--title">Остались вопросы?</h2>
            <span class="feedback--text">Оставьте свой E-mail и мы обязательно свяжемся с вами! :)</span>
        </div>
        <form class="form feedback--form">
            <fieldset class="form--fieldset">
                <ul class="form--field-list">
                    <li class="form--field-row">
                        <input class="form--input form--input__full" type="text" placeholder="Ваше имя">
                    </li>
                    <li class="form--field-row">
                        <input type="text" class="form--input form--input__full" placeholder="Ваш e-mail">
                    </li>
                    <li class="form--field-row">
                        <textarea class="form--textarea form--input__full" rows=7 placeholder="Текст сообщения"></textarea>
                    </li>
                    <li class="form--field-row">
                        <input type="submit" class="form--button form--button__dark" value="Отправить  ✉">
                    </li>
                </ul>
            </fieldset>
        </form>
    </article>
</main>
<? template('footer'); ?>
    </body>
</html>