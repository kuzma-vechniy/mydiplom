<? $categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result(); ?>
<? 
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
            <article>
                <img src="css/img/slider/slide1.png" class="slider">
            </article>
                <form class="form form__inline">
                    <ul class="form--field-list">
                        <li class="form--field">
                            <label class="form--label">
                                Сортировать: 
                            </label>
                            <select class="form--select">
                                <option>по возрастанию цены</option>
                                <option>по убыванию цены</option>
                            </select>
                        </li>
                        <li class="form--field">
                            <label class="form--label">
                                Сортировать: 
                            </label>
                            <select class="form--select">
                                <option>по возрастанию цены</option>
                                <option>по убыванию цены</option>
                            </select>
                        </li>
                        <li class="form--field">
                            <label class="form--label">
                                Сортировать: 
                            </label>
                            <select class="form--select">
                                <option>по возрастанию цены</option>
                                <option>по убыванию цены</option>
                            </select>
                        </li>
                        
                    </ul>
                </form>
        </div>        
    </section>
    <section class="col">
        <article class="content">
            <h2 class="content--title">
                Популярное
            </h2>
            <ul class="content--list">
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <a href="#"><img src="css/img/cards.png"class="product--card"></a>
                        </div>
                    </article>
                </li>
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <img src="css/img/cards.png"class="product--card">
                        </div>
                    </article>
                </li>
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <img src="css/img/cards.png"class="product--card">
                        </div>
                    </article>
                </li>
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <img src="css/img/cards.png"class="product--card">
                        </div>
                    </article>
                </li>
            </ul>
        </article>
        <article class="content">
            <h2 class="content--title">
                Популярное
            </h2>
            <ul class="content--list">
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <a href="#"><img src="css/img/cards.png"class="product--card"></a>
                        </div>
                    </article>
                </li>
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <img src="css/img/cards.png"class="product--card">
                        </div>
                    </article>
                </li>
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <img src="css/img/cards.png"class="product--card">
                        </div>
                    </article>
                </li>
                <li class="content--item">
                    <article class="product">
                        <img class="product--image" src="css/img/product.png">
                        <h3 class="product--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h3>
                        <span class="product--price">2000 руб.</span>
                        <div class="product--buttons">
                            <input type="button" value="В корзину" class="product--button">
                            <img src="css/img/cards.png"class="product--card">
                        </div>
                    </article>
                </li>
            </ul>
        </article>
        <article class="content">
            <h2 class="content--title">Новости</h2>
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
                        <footer class="news--footer">
                            <a href="#" class="news--link">Узнать больше  ↓</a>
                        </footer>
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
        <footer class="news--footer">
            <a href="#" class="news--link">Узнать больше  ↓</a>
        </footer>
    </article>
    </li>
            </ul>
        </article>

        <article class="content">
            <h2 class="content--title">Доставка</h2>
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
                        <input class="form--input" type="text" placeholder="Ваше имя">
                    </li>
                    <li class="form--field-row">
                        <input type="text" class="form--input" placeholder="Ваш e-mail">
                    </li>
                    <li class="form--field-row">
                        <textarea class="form--textarea" rows=7 placeholder="Текст сообщения"></textarea>
                    </li>
                    <li class="form--field-row">
                        <input type="submit" class="form--button form--button__dark" value="Отправить">
                    </li>
                </ul>
            </fieldset>
        </form>
    </article>
</main>

    </body>
</html>