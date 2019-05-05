<?  if (isset($_GET['product_id'])) $product = $db->from('products')->find_by(['id' => $_GET['product_id']])->execute()->result();
    if (!isset($product) || $product == null) {template('404'); exit(); } ?>


    <? $db->delete('products')->where(['id' => $product->id])->execute() ?>
    
    <? redirect(page_url('admin_products')); ?>