<html>
    <? $title = 'Создание брэнда';
     template('head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <form method="POST">
            <p>
                <label>
                    Имя
                </label>
                <input type="text" name="name">
            </p>
            <input type="submit">
        </form>
    </body>
</html>