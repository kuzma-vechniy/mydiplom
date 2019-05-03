<html>
    <? $title = 'Корзина' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>
        <main class="wrap wrap__fixed">
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
                    <tr>
                        <td> <img src="css/img/product.png"></td>
                        <td>
                        <div class="col col__left">
                            <span class="table--text-primary">
                                Ноутбук LENOVO IdeaPad 330-15IKBR
                            </span>
                            <span class="table--text-bold">35400 ₽</span>
                        </div>
                        </td>
                        <td>
                        <div class="col col__left">
                            <input type="number" class="table--input-number">
                            <a href="#" class="table--link">Удалить</a>
                        </div>
                        </td>
                        <td>
                            <span>35400 ₽</span>
                        </td>
                    </tr>
                    <tr class="table--head">
                        <td></td>
                        <td></td>
                        <td><span>Общая стоимость вашего заказа:</span></td>
                        <td><span>35400 ₽</span></td>
                    </tr>
                </tbody>
            </table>
            <h2 class="content--title">Есть купон?</h2>
            <form class="form">
                <label class="form--label">Ввести код</label>
                <input type="text" class="form--input">;
            </form>
        </article>
        
        </main>
        <? template('footer'); ?>
    </body>
</html>