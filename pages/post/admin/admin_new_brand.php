<?  if (isset($_GET['brand_id'])) $brand = $db->from('brands')->find_by(['id' => $_GET['brand_id']])->execute()->result();
    if (!isset($brand) || $brand == null || !isset($_POST['name'])) {redirect(page_url('admin_edit_brand', ['brand_id' => $brand->id])); exit(); } ?>

    <?

        $brand = $db->insert('brands')->params(
            [
                'name' => $_POST['name']
            
            ]
        )->execute()->result();

        redirect(page_url('admin_edit_brand', ['brand_id' => $brand->id]));
    ?>