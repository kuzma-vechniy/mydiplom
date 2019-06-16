<? $parent_categories = $db->from('categories')->where(['category_id' => '0'])->execute()->result() ?>
<? $selectable_brands = $db->from('brands')->execute()->result() ?>
<? $selectable_categories = $db->from('categories')->where(['category_id' => isolate($parent_categories, 'id')])->execute()->result()?>

<html>
    <? $title = 'Создание продукта';
     template('admin_head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <div class="container">
            <form class="mt-5" method="POST">
                <div class="form-group">
                    <label>
                        Имя
                    </label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>
                        Цена
                    </label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label>
                        Категория
                    </label>
                    <select class="form-control" name="category_id">
                        <option value="0">Выберите категорию</option>
                        <? foreach($selectable_categories as $category){?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Brand
                    </label>
                    <select name="brand_id" class="form-control">
                        <option value="0">Выберите брэнд</option>
                        <? foreach($selectable_brands as $brand){?>
                            <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Маленькое описание
                    </label>
                    <textarea class="form-control" name="small_description"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        Описание
                    </label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        Изображение
                    </label>
                    <input class="form-control" type="text" name="img">
                </div>
                <input class="btn btn-primary" value="Сохранить" type="submit">
            </form>
        </div>
    </body>
</html>