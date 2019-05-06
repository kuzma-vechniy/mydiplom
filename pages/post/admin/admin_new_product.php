<? 
    if ($_POST['category_id'] != '0') $category = $db->from('categories')->find_by(['id' => $_POST['category_id']])->execute()->result();
    if ($_POST['brand_id'] != '0') $brand = $db->from('brands')->find_by(['id' => $_POST['brand_id']])->execute()->result();

    if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($brand) || !isset($category) || !isset($_POST['description']) || !isset($_POST['small_description'])) {redirect(page_url('admin_new_product')); exit(); } 
        $db->insert('products')->params(
            [
                'name' => $_POST['name'],
                'category_id' => (int)$_POST['category_id'],
                'brand_id' => (int)$_POST['brand_id'],
                'description' => $_POST['description'],
                'small_description' => $_POST['small_description'],
                'price' => $_POST['price']
            
            ]
        )->execute()->result();
        $product = $db->from('products')->order('id desc')->limit(1)->execute()->result();
        if( $product->name === $_POST['name'] ){
            redirect(page_url('admin_products'));
        }else{
            redirect(page_url('admin_new_product'));
        }