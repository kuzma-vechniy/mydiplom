<html>
    <? $title = 'Создание категории';
     template('head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <form method="POST">
            <p>
                <label>
                    Имя
                </label>
                <input type="text" name="name">
            </p>
            <p>
                <label>
                    Категория
                </label>
                <select name="category_id">
                    <option value="0">Выберите категорию</option>
                    <? foreach($db->from('categories')->where(['category_id' => '0'])->execute()->result() as $parent_category){?>
                        <option value="<?= $parent_category->id ?>"><?= $parent_category->name ?></option>
                    <? } ?>
                </select>
            </p>
            <input type="submit">
        </form>
    </body>
</html>