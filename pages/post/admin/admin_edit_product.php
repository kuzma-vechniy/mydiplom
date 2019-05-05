<?  if (isset($_GET['product_id'])) $product = $db->from('products')->find_by(['id' => $_GET['product_id']])->execute()->result();
    if (!isset($product) || $product == null) {redirect(page_url('admin_edit_product', ['product_id' => $product->id])); exit(); }
    
    if ($_POST['category_id'] != '0') $category = $db->from('categories')->find_by(['id' => $_POST['category_id']])->execute()->result();
    if ($_POST['brand_id'] != '0') $brand = $db->from('brands')->find_by(['id' => $_POST['brand_id']])->execute()->result();

    if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($brand) || !isset($category) || !isset($_POST['description']) || !isset($_POST['small_description'])) {redirect(page_url('admin_edit_product', ['product_id' => $product->id])); exit(); } 
    $db->update('products')->set([
        'name' => $_POST['name'],
        'category_id' => (int)$_POST['category_id'],
        'brand_id' => (int)$_POST['brand_id'],
        'description' => $_POST['description'],
        'small_description' => $_POST['small_description'],
        'price' => $_POST['price']
    ])->find_by(['id' => $product->id])->execute();


        if( $db->from('products')->find_by(['id' => $product->id])->execute()->result()->name === $_POST['name']) redirect(page_url('admin_products'));
        else redirect(page_url('admin_edit_product', ['product_id' => $product->id]));
    ?>