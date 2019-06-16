<html>
    <? $title = 'Создание брэнда';
     template('admin_head', ['title' => $title]); 
     ?>
    <body>
        <? template('admin_header'); ?>
        <div class="container">
            <form method="POST" class="mt-5">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter brand name">
                </div>
                <input class="btn btn-primary" value="Добавить" type="submit">
            </form>
        </div>
    </body>
</html>