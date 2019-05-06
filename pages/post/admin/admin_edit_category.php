<?  if (isset($_GET['category_id'])) $category = $db->from('categories')->find_by(['id' => $_GET['category_id']])->execute()->result();
    if (!isset($category) || $category == null || !isset($_POST['name'])) {redirect(page_url('admin_edit_category', ['category_id' => $category->id])); exit(); }
    
    if ($_POST['category_id'] != '0') {
        $parent_category = $db->from('categories')->find_by(['id' => $_POST['category_id'], 'category_id' => '0'])->execute()->result();
        if (!isset($parent_category)){
            redirect(page_url('admin_edit_category', ['category_id' => $category->id])); 
            exit();
        }
    }        
    $db->update('categories')->set([
        'name' => $_POST['name'],
        'category_id' => (int)$_POST['category_id']
    ])->find_by(['id' => $category->id])->execute();

        if( $db->from('categories')->find_by(['id' => $category->id])->execute()->result()->name === $_POST['name']) redirect(page_url('admin_categories'));
        else redirect(page_url('admin_edit_category', ['category_id' => $category->id]));