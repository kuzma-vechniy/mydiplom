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
    </section>
</main>

    </body>
</html>