<html>
    <? $title = 'Категории';
     template('head', ['title' => $title]); 
     $categories = $db->from('categories')->execute()->result();
     $category_list_by_id = map($categories, 'id');
     ?>
    <body>
        <? template('admin_header'); ?>
        <a href="<?= page_url('admin_new_category') ?>">New</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                <? foreach($categories as $category){ ?>
                <? if($category->category_id != 0) $category->category = $category_list_by_id[$category->category_id];?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td>
                            <? if(isset($category->category)) echo $category->category->name ?>
                        </td>
                        <td>
                            <a href="<?= page_url('admin_edit_category', ['category_id' => $category->id]) ?>">
                                Edit
                            </a>
                            <a href="<?= page_url('admin_delete_category', ['category_id' => $category->id]) ?>" data-confirm="Are you sure?">
                                Delete
                            </a>
                        </td>
                    </tr>
                <? } ?>
            </tbody>
        </table>
    </body>
</html>