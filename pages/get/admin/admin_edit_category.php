<?  if (isset($_GET['category_id'])) $category = $db->from('categories')->find_by(['id' => $_GET['category_id']])->execute()->result();
    if (!isset($category) || $category == null) {template('404'); exit(); } ?>

<html>
    <? $title = 'Редактирование категории';
     template('admin_head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <div class="container">
            <form method="POST" class="mt-5">
                <div class="form-group">
                    <label>
                        Имя
                    </label>
                    <input class="form-control" type="text" name="name" value="<?= $category->name ?>">
                </div>
                <div class="form-group">
                    <label>
                        Категория
                    </label>
                    <select class="form-control" name="category_id">
                        <option value="0">Выберите категорию</option>
                        <? foreach($db->from('categories')->where(['category_id' => '0'])->execute()->result() as $parent_category){?>
                            <option <? if($parent_category->id === $category->category_id) echo 'selected'?> value="<?= $parent_category->id ?>"><?= $parent_category->name ?></option>
                        <? } ?>
                    </select>
                </div>
                <input class="btn btn-primary" value="Сохранить" type="submit">
            </form>
        </div>
    </body>
</html>