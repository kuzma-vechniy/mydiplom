<? 
    if ($_POST['category_id'] != '0') $parent_category = $db->from('categories')->find_by(['id' => $_POST['category_id'], 'category_id' => '0'])->execute()->result();
    if (!isset($_POST['name']) || ( $_POST['category_id'] != '0' && !isset($parent_category))) {redirect(page_url('admin_new_category')); exit(); } 
        $db->insert('categories')->params(
            [
                'name' => $_POST['name'],
                'category_id' => (int)$_POST['category_id']
            
            ]
        )->execute()->result();
        $category = $db->from('categories')->order('id desc')->limit(1)->execute()->result();
        if( $category->name === $_POST['name'] ){
            redirect(page_url('admin_categories'));
        }else{
            redirect(page_url('admin_new_category'));
        }
    ?>