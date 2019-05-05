<? $parent_categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result() ?>
<? $selectable_brands = $db->from('brands')->execute()->result() ?>
<? $selectable_categories = $db->from('categories')->where(['category_id' => isolate($parent_categories, 'id')])->execute()->result()?>

<html>
    <? $title = 'Создание продукта';
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
                    Цена
                </label>
                <input type="text" name="price">
            </p>
            <p>
                <label>
                    Категория
                </label>
                <select name="category_id">
                    <option value="0">Выберите категорию</option>
                    <? foreach($selectable_categories as $category){?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <? } ?>
                </select>
            </p>
            <p>
                <label>
                    Brand
                </label>
                <select name="brand_id">
                    <option value="0">Выберите брэнд</option>
                    <? foreach($selectable_brands as $brand){?>
                        <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                    <? } ?>
                </select>
            </p>
            <p>
                <label>
                    Маленькое описание
                </label>
                <textarea name="small_description"></textarea>
            </p>
            <p>
                <label>
                    Описание
                </label>
                <textarea name="description"></textarea>
            </p>
            <input type="submit">
        </form>
    </body>
</html>