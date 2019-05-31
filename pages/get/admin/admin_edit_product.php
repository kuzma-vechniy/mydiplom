<?  if (isset($_GET['product_id'])) $product = $db->from('products')->find_by(['id' => $_GET['product_id']])->execute()->result();
    if (!isset($product) || $product == null) {template('404'); exit(); } ?>

<? $parent_categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result() ?>
<? $selectable_brands = $db->from('brands')->execute()->result() ?>
<? $selectable_categories = $db->from('categories')->where(['category_id' => isolate($parent_categories, 'id')])->execute()->result()?>

<html>
    <? $title = 'Редактирование продукта';
     template('head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <form method="POST">
            <p>
                <label>
                    Имя
                </label>
                <input type="text" name="name" value="<?= $product->name?>">
            </p>
            <p>
                <label>
                    Цена
                </label>
                <input type="text" name="price" value="<?= $product->price?>">
            </p>
            <p>
                <label>
                    Категория
                </label>
                <select name="category_id">
                    <option value="0">Выберите категорию</option>
                    <? foreach($selectable_categories as $category){?>
                        <option <? if($category->id === $product->category_id) echo 'selected'?> value="<?= $category->id ?>"><?= $category->name ?></option>
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
                        <option <? if($brand->id === $product->brand_id) echo 'selected'?> value="<?= $brand->id ?>"><?= $brand->name ?></option>
                    <? } ?>
                </select>
            </p>
            <p>
                <label>
                    Маленькое описание
                </label>
                <textarea name="small_description"><?= $product->small_description?></textarea>
            </p>
            <p>
                <label>
                    Описание
                </label>
                <textarea name="description"><?= $product->description?></textarea>
            </p>
            <p>
                <label>
                    Изображение
                </label>
                <input value="<?= $product->img ?>" type="text" name="img">
            </p>
            <p><img alt="<?= $product->name ?>" width=400 src="<?= $product->img ?>"></p>
            <input type="submit">
        </form>
    </body>
</html>