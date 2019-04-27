<? $categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result(); ?>

<html>
    <? $title = 'Главная' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>

        <ul>
            <? foreach($categories as $category){?>
                <li>
                    <a href="<?= page_url('category', ['category_id' => $category->id]) ?>">
                        <?= $category->name ?>
                    </a>
                </li>
            <? } ?>            
        </ul>

    </body>
</html>