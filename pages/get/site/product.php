
<?  if (isset($_GET['product_id'])) $product = $db->from('products')->find_by(['id' => $_GET['product_id']])->execute()->result();
    if ($product == null) {template('404'); exit(); } ?>

<?  $category = $db->from('categories')->where(['id' => $product->category_id])->execute()->result();
    $brand = $db->from('brands')->where(['id' => $product->brand_id])->execute()->result();
    $images = $db->from('images')->where(['product_id' => $product->id])->execute()->result();

    $comments = $db->from('comments')->where(['product_id' => $product->id])->execute()->result();
    $questions = $db->from('questions')->where(['product_id' => $product->id])->execute()->result();

    $users = $db->from('users')->where(['id' => isolate($comments, 'user_id') + isolate($questions, 'user_id')])->execute()->result();
    $users_by_id = array();

    foreach ($users as $user) {
            $users[$user->id] = $user;
    }

    $builds = $db->from('builds')->whhere(['product_id' => $product->id])->execute()->result();
    $title = $product->name ?>
    
<html>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>
    </body>
    <ul>
        
    </ul>
</html>
