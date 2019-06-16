<? 
(isset($_COOKIE['products'])) ? $product_array = explode(',',$_COOKIE['products']) : $product_array = [];
$backet_array = [];
$products_by_id = map($db->from('products')->execute()->result(), 'id');
foreach($product_array as $product_info){
    if($product_info != ''){
    $product_info_array = explode(':', $product_info);
    if (!isset($backet_array[$product_info_array[0]])){
        $backet_array[$product_info_array[0]] = ['product' => $products_by_id[$product_info_array[0]], 'count' => $product_info_array[1]];
    }else{
        $backet_array[$product_info_array[0]]['count'] += $product_info_array[1];
    }
    }
}
?>

<html>
    <? $title = 'Корзина' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>
        <main class="wrap wrap__fixed-small">
        <article class="content ">
            <h2 class="content--title">Корзина</h2>
            <table class="table">
                <thead>
                <tr class="table--head">
                    <td>Ваш заказ</td>
                    <td></td>
                    <td>Количество</td>
                    <td>Сумма</td>
                </tr>
                </thead>
                <tbody>
                <? $amount = 0; ?>
                    <? foreach($backet_array as $backet_info){ 
                        $product = $backet_info['product'];
                        $amount += $product->price * $backet_info['count'];
                        ?>
                        <tr>
                            <td> <img alt="<?= $product->name ?>" width="200" src="<?= $product->img ?>"></td>
                            <td>
                            <div class="col col__left">
                                <a href="<?= page_url('product', ['product_id' => $product->id]); ?>">
                                <span class="table--text-primary">
                                    <?= $product->name ?>
                                </span>
                                </a>
                                <span class="table--text-bold"><?= $product->price ?> ₽</span>
                            </div>
                            </td>
                            <td>
                            <div class="col col__left">
                                <input type="number" onkeyup="changeProductCount(<?= $product->id ?>,<?= $product->price ?> ,this.value)" onclick="changeProductCount(<?= $product->id ?>,<?= $product->price ?> ,this.value)" value="<?= $backet_info['count'] ?>" class="table--input-number">
                                <a href="#" class="table--link" onclick="deleteFromBasket(<?=$product->id ?>)">🗑 Удалить</a>
                            </div>
                            </td>
                            <td>
                                <span id="amount-<?= $product->id ?>"><?= $product->price * $backet_info['count'] ?></span> ₽
                            </td>
                        </tr>
                    <? } ?>
                    <tr class="table--head">
                        <td></td>
                        <td></td>
                        <td><span>Общая стоимость вашего заказа:</span></td>
                        <td><span id="total"><?= $amount ?></span> ₽</td>
                    </tr>
                </tbody>
            </table>
            <h2 class="content--title">Есть купон?</h2>
            <form class="form form__full-size" >
                <div class="form--field-row">
                    <label class="form--label">Ввести код</label>
                    <div class="row">
                        <input type="text" class="form--input form--input__var2 form--input__large">
                        <input type="button" class="button button__small" value="Применить">
                    </div>
                </div>
            </form>
            <div class="row row__padding-top row__space-between">
                <a href="<?= page_url('main') ?>" class="button button__small">⬅ Вернуться на главную</a>
                <input type="submit" class="button button__small button__primary" value="Оформить заказ">
            </div>
        </article>
        
        </main>
        <? template('footer'); ?>
    </body>
</html>