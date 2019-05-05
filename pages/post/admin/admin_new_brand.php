<? 
    if (!isset($_POST['name'])) {redirect(page_url('admin_new_brand')); exit(); } ?>

    <?

        $db->insert('brands')->params(
            [
                'name' => $_POST['name']
            
            ]
        )->execute()->result();
        $brand = $db->from('brands')->order('id desc')->limit(1)->execute()->result();
        if( $brand->name === $_POST['name'] ){
            redirect(page_url('admin_brands'));
        }else{
            redirect(page_url('admin_new_brand'));
        }
    ?>