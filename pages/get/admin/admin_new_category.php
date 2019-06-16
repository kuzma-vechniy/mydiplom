<html>
    <? $title = 'Создание категории';
     template('admin_head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <div class="container">
            <form method="POST" class="mt-5">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter category name">
                </div>
                <div class="form-group">
                    <label for="category_id">
                        Категория
                    </label>
                    <select class="form-control" name="category_id">
                        <option value="0">Выберите категорию</option>
                        <? foreach($db->from('categories')->where(['category_id' => '0'])->execute()->result() as $parent_category){?>
                            <option value="<?= $parent_category->id ?>"><?= $parent_category->name ?></option>
                        <? } ?>
                    </select>
                </div>
                <input class="btn btn-primary" value="Добавить" type="submit">
            </form>
        </div>
    </body>
</html>