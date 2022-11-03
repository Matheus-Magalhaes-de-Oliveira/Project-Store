<h1>List - Products</h1>
<a href="<?php echo App\Config\Config::url("/admin/products/create") ?>">Create New Product</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <?php foreach ($products as $product) { ?>
        <tr>
            <td><?php echo $product->id_products  ?></td>
            <td><img class="small-blocked-image" src="<?php echo \App\Config\Config::url($product->image) ?>"></td>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->categories?></td>
            <td>R$<?php echo number_format($product->price, 2, ",", ".") ?></td>
            <td><?php echo $product->description ?></td>
            <td><?php echo date('d/m/Y H:i:s', strtotime($product->created_at)) ?></td>
            <td>
                <a class="edit" href="<?php echo \App\Config\Config::url("/admin/products/edit?id=" . $product->id_products) ?>">Edit</a>
            </td>
            <td>
                <a class="delete" href="<?php echo \App\Config\Config::url("/admin/products/delete?id=" . $product->id_products) ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>