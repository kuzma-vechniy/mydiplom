<?  if (isset($_GET['category_id'])) $category = $db->from('categories')->find_by(['id' => $_GET['category_id']])->execute()->result();
    if (!isset($category) || $category == null) {template('404'); exit(); } ?>

<html>
    <? $title = 'Редактирование категории';
     template('head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <form method="POST">
            <p>
                <label>
                    Имя
                </label>
                <input type="text" name="name" value="<?= $category->name ?>">
            </p>
            <p>
                <label>
                    Категория
                </label>
                <select name="category_id">
                    <option value="0">Выберите категорию</option>
                    <? foreach($db->from('categories')->where(['category_id' => '0'])->execute()->result() as $parent_category){?>
                        <option <? if($parent_category->id === $category->category_id) echo 'selected'?> value="<?= $parent_category->id ?>"><?= $parent_category->name ?></option>
                    <? } ?>
                </select>
            </p>
            <input type="submit">
        </form>
    </body>
</html>