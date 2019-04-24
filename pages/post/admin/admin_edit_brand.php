<?  if (isset($_GET['brand_id'])) $brand = $db->from('brands')->find_by(['id' => $_GET['brand_id']])->execute()->result();
    if (!isset($brand) || $brand == null || !isset($_POST['name'])) {redirect(page_url('admin_edit_brand', ['brand_id' => $brand->id])); exit(); } ?>

    <?
        $db->update('brands')->set([
            'name' => $_POST['name']
        ])->find_by(['id' => $brand->id])->execute();

        redirect(page_url('admin_edit_brand', ['brand_id' => $brand->id]));
    ?>