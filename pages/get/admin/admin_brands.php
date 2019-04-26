<html>
    <? $title = 'Брэнды';
     template('head', ['title' => $title]); 
     $brands = $db->from('brands')->execute()->result();
     ?>
    <body>
        <? template('admin_header'); ?>
        <a href="<?= page_url('admin_new_brand') ?>">New</a>
        <table>
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
                        </td>
                    </tr>
                <? } ?>
            </tbody>
        </table>
    </body>
</html>