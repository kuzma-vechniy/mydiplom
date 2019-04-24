
<?  if (isset($_GET['category_id'])) $category = $db->from('categories')->find_by(['id' => $_GET['category_id']])->execute()->result();
    if ($category == null) {template('404'); exit(); } ?>

<?  $categories = $db->from('categories')->where(['category_id' => $category->id])->execute()->result();
    $products = $db->from('products')->where(['category_id' => isolate($categories, 'id')])->execute()->result();
    $brands = $db->from('brands')->where(['id' => isolate($products, 'brand_id')])->execute()->result();
    $title = $category->name ?>
    
<html>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>
    </body>
    <ul>
        <? foreach($products as $product){ ?>
        <li>
            <a href="<?= page_url('product', ['product_id' => $product->id]) ?>">
                <?= $product->name ?>
            </a>
        </li>
        <? } ?>
    </ul>
</html>
