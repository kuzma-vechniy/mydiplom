<?  if (isset($_GET['product_id'])) $product = $db->from('products')->find_by(['id' => $_GET['product_id']])->execute()->result();
    if (!isset($product) || $product == null) {template('404'); exit(); } ?>

<? $parent_categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result() ?>
<? $selectable_brands = $db->from('brands')->execute()->result() ?>
<? $selectable_categories = $db->from('categories')->where(['category_id' => isolate($parent_categories, 'id')])->execute()->result()?>

<html>
    <? $title = 'Редактирование продукта';
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
                    <input type="text" class="form-control" name="name" value="<?= $product->name?>">
                </div>
                <div class="form-group">
                    <label>
                        Цена
                    </label>
                    <input type="text" class="form-control" name="price" value="<?= $product->price?>">
                </div>
                <div class="form-group">
                    <label>
                        Категория
                    </label>
                    <select class="form-control" name="category_id">
                        <option value="0">Выберите категорию</option>
                        <? foreach($selectable_categories as $category){?>
                            <option <? if($category->id === $product->category_id) echo 'selected'?> value="<?= $category->id ?>"><?= $category->name ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Brand
                    </label>
                    <select class="form-control" name="brand_id">
                        <option value="0">Выберите брэнд</option>
                        <? foreach($selectable_brands as $brand){?>
                            <option <? if($brand->id === $product->brand_id) echo 'selected'?> value="<?= $brand->id ?>"><?= $brand->name ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Маленькое описание
                    </label>
                    <textarea class="form-control" name="small_description"><?= $product->small_description?></textarea>
                </div>
                <div class="form-group">
                    <label>
                        Описание
                    </label>
                    <textarea class="form-control" name="description"><?= $product->description?></textarea>
                </div>
                <div class="form-group">
                    <label>
                        Изображение
                    </label>
                    <input class="form-control" value="<?= $product->img ?>" type="text" name="img">
                </div>
                <div class="form-group">
                    <img alt="<?= $product->name ?>" width=400 src="<?= $product->img ?>">
                </div>
                <input class="btn btn-primary" value="Сохранить" type="submit">
            </form>
        </div>
    </body>
</html>