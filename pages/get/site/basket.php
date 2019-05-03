<html>
    <? $title = 'Корзина' ?>
    <? template('head', ['title' => $title]); ?>
    <body>
        <? template('header'); ?>
        <main class="wrap wrap__fixed">
        <article class="content ">
            <h2 class="content--title">Корзина</h2>
            <table>
                <thead>
                    <th>Ваш заказ</th>
                    <th></th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </thead>
                <tbody>
                    <tr>
                        <td> <img src="css/img/product.png"></td>
                        <td>
                            <span>
                                Ноутбук LENOVO IdeaPad 330-15IKBR
                            </span>
                            <span>35400 ₽</span>
                        </td>
                        <td>
                            <input type="number">
                            <a href="#">Удалить</a>
                        </td>
                        <td>
                            <span>35400 ₽</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><span>Общая стоимость вашего заказа:</span></td>
                        <td><span>35400 ₽</span></td>
                    </tr>
                </tbody>
            </table>
        </article>
        
        </main>
        <? template('footer'); ?>
    </body>
</html>