<? $categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result(); ?>

<html>
    <? $title = 'Главная' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>

<main>
    <section class="row row__wrapped">
        <aside class="category row--item">
            <h2 class="category--title">
                Категории
            </h2>
            <ul class="category--list">
                <li class="category--item">
                    <a href="#" class="category--link">
                        Категория
                    </a>
                    <article class="category category__sub">
                        <ul class="category--list">
                            <li class="category--item">
                                <a class="category--link" href="#">
                                    Субкатегория
                                </a>
                            </li>
                            <li class="category--item">
                                <a class="category--link" href="#">
                                    Субкатегория 2
                                </a>
                            </li>
                        </ul>
                    </article>
                </li>
                <li class="category--item">
                    <a href="#" class="category--link">
                        Категория
                    </a>
                    <article class="category category__sub">
                        <ul class="category--list">
                            <li class="category--item">
                                <a class="category--link" href="#">
                                    Субкатегория 3
                                </a>
                            </li>
                            <li class="category--item">
                                <a class="category--link" href="#">
                                    Субкатегория 4
                                </a>
                            </li>
                        </ul>
                    </article>
                </li>
                <? foreach($categories as $category){?>
                    <li class="category--item">
                        <a class="category--link" href="<?= page_url('category', ['category_id' => $category->id]) ?>">
                            <?= $category->name ?>
                        </a>
                    </li>
                <? } ?>            
            </ul>     
        </aside>
        <article>
            
        </article>
        <article>

        </article>        
    </section>

</main>

    </body>
</html>