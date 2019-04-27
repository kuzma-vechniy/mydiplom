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

<main>
    <section class="row row__wrapped">
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
        <article>
            
        </article>
        <article>

        </article>        
    </section>

</main>

    </body>
</html>