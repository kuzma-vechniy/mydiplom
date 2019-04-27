<?  if (isset($_GET['category_id'])) $category = $db->from('categories')->find_by(['id' => $_GET['category_id']])->execute()->result();
    if (!isset($category) || $category == null) {template('404'); exit(); } ?>


    <? $db->delete('categories')->where(['id' => $category->id])->execute() ?>
    
    <? redirect(page_url('admin_categories')); ?>