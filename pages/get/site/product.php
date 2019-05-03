
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

    $builds = $db->from('builds')->where(['product_id' => $product->id])->execute()->result();
    $title = $product->name ?>
    
<html>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>
        <main class="wrap wrap__fixed">
            <section class="content">
            <h2 class="content--title">Ноутбук LENOVO IdeaPad 330-15IKBR</h2>
            <div class="row">
                <div class="col">
                    <a href="http://localhost/css/img/item-photo.png" target="frame"><img src="css/img/item-photo.png" class="image image__small"></a>
                    <a href="http://localhost/css/img/item-photo.png" target="frame"><img src="css/img/item-photo.png" class="image image__small"></a>
                    <a href="http://localhost/css/img/item-photo.png" target="frame"><img src="css/img/item-photo.png" class="image image__small"></a>
                </div>
    <iframe name="frame" class="image image__large">

    </iframe>
    <article class="col col__border">
        <h3 class="content--title">Цена: 35400 ₽</h3>
        <span class="text">Этот товар еще никто не оценил</span>
        <span class="text">🚛 Доставка: завтра (500 ₽)</span>
        <input type="button" value ="🛒 В корзину" class="button button__primary">

    </article>
            </div>
            </section>

        </main>
        <? template('footer'); ?>
    </body>
</html>
