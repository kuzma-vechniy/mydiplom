<html>
    <? $title = 'Продукты';
     template('admin_head', ['title' => $title]); 
     $products = $db->from('products')->execute()->result();
     $categories =  $db->from('categories')->execute()->result();
     $brands =  $db->from('brands')->execute()->result();
     $category_list_by_id = map($categories, 'id');
     $brand_list_by_id = map($brands, 'id');
     ?>
    <body>
        <? template('admin_header'); ?>
        <div class="container">
            <a class="btn btn-success mt-4 mb-4" href="<?= page_url('admin_new_product') ?>">New</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach($products as $product){ ?>
                    <? if($product->category_id != 0) $category = $category_list_by_id[$product->category_id];?>
                    <? if($product->brand_id != 0) $brand = $brand_list_by_id[$product->brand_id];?>
                        <tr>
                            <td><?= $product->id ?></td>
                            <td><?= $product->name ?></td>
                            <td>
                                <? if(isset($category)) echo $category->name ?>
                            </td>
                            <td>
                                <? if(isset($brand)) echo $brand->name ?>
                            </td>
                            <td>
                                <a href="<?= page_url('admin_edit_product', ['product_id' => $product->id]) ?>">
                                    Edit
                                </a>
                                <a href="<?= page_url('admin_delete_product', ['product_id' => $product->id]) ?>" data-confirm="Are you sure?">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    </body>