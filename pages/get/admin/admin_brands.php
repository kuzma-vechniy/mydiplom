<html>
    <? $title = 'Брэнды';
     template('admin_head', ['title' => $title]); 
     $brands = $db->from('brands')->execute()->result();
     ?>
    <body>
        <? template('admin_header'); ?>
        <div class="container">
            <a class="btn btn-success mt-4 mb-4" href="<?= page_url('admin_new_brand') ?>">New</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                <? foreach($brands as $brand){ ?>
                    <tr>
                        <td><?= $brand->id ?></td>
                        <td><?= $brand->name ?></td>
                        <td>
                            <a href="<?= page_url('admin_edit_brand', ['brand_id' => $brand->id]) ?>">
                                Edit
                            </a>
                            <a href="<?= page_url('admin_delete_brand', ['brand_id' => $brand->id]) ?>" data-confirm="Are you sure?">
                                Delete
                            </a>
                        </td>
                    </tr>
                <? } ?>
            </tbody>
        </table>
    </body>
</html>