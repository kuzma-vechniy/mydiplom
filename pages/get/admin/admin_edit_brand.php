<?  if (isset($_GET['brand_id'])) $brand = $db->from('brands')->find_by(['id' => $_GET['brand_id']])->execute()->result();
    if (!isset($brand) || $brand == null) {template('404'); exit(); } ?>
<html>
    <? $title = 'Редактирование брэнда';
     template('admin_head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <form method="POST">
            <div class="container">
            <form method="POST" class="mt-5">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?= $brand->name ?>" class="form-control" name="name" placeholder="Enter brand name">
                </div>
                <input class="btn btn-primary" value="Сохранить" type="submit">
            </form>
            </div>
        </form>
    </body>
</html>