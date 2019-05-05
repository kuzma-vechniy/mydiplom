<?  if (isset($_GET['brand_id'])) $brand = $db->from('brands')->find_by(['id' => $_GET['brand_id']])->execute()->result();
    if (!isset($brand) || $brand == null) {template('404'); exit(); } ?>


    <? $db->delete('brands')->where(['id' => $brand->id])->execute() ?>
    
    <? redirect(page_url('admin_brands')); ?>