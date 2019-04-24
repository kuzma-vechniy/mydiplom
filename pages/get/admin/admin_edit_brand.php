<?  if (isset($_GET['brand_id'])) $brand = $db->from('brands')->find_by(['id' => $_GET['brand_id']])->execute()->result();
    if (!isset($brand) || $brand == null) {template('404'); exit(); } ?>
<html>
    <? $title = 'Редактирование брэнда';
     template('head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <form method="POST">
            <p>
                <label>
                    Имя
                </label>
                <input type="text" name="name" value="<?= $brand->name ?>">
            </p>
            <input type="submit">
        </form>
    </body>
</html>