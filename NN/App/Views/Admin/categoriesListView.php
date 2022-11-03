<h1>List Categories</h1>
<a href="<?php echo App\Config\Config::url("/admin/categories/create")?>">Create New Categories</a>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th></th>
    </tr>
    <?php foreach($categories as $category){ ?>
    <tr>
        <td><?php echo $category->id_categories  ?></td>
        <td><?php echo $category->name ?></td>
        <td>
        [<a href="<?php echo \App\Config\Config::url("/admin/categories/edit?id=".$category->id_categories)?>">Edit</a>
        [<a href="<?php echo \App\Config\Config::url("/admin/categories/delete?id=".$category->id_categories)?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>