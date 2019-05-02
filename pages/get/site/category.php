
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
    <main class="wrap wrap__fixed">
    <section class="row row__space-between">
    <aside class="category row--item">
            <h2 class="category--title">
                Фильтры
            </h2>
            <ul class="category--list">
                <li class="category--block">
                    <h3 class="category--subtitle">
                        Цена
                    </h3>
                    <div class="row">
                        <input type="number" placeholder="от" class="category--price-input">
                        <input type="number" placeholder="до" class="category--price-input">
                    </div>
                </li> 
                <li class="category--block category--block__border">
                    <h3 class="category--subtitle">Производитель</h3>
                    <ul class="category--list">
                        <li class="category--item">
                            <input type="checkbox" class="category--checkbox">
                            <label class="category--label">Asus</label>
                        </li>
                        <li class="category--item">
                            <input type="checkbox" class="category--checkbox">
                            <label class="category--label">Asus</label>
                        </li>
                        <li class="category--item">
                            <input type="checkbox" class="category--checkbox">
                            <label class="category--label">Asus</label>
                        </li>
                        <li class="category--item">
                            <input type="checkbox" class="category--checkbox">
                            <label class="category--label">Asus</label>
                        </li>
                        
                    </ul>
                </li>          
            </ul>     
        </aside>
</section>
</main>








    <ul>
        <? foreach($products as $product){ ?>
        <li>
            <a href="<?= page_url('product', ['product_id' => $product->id]) ?>">
                <?= $product->name ?>
            </a>
        </li>
        <? } ?>
    </ul>
    <? template('footer'); ?>
</html>
