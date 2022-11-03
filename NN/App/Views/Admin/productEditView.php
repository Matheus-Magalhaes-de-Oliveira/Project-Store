<form class="form" method="POST" action="<?php echo \App\Config\Config::url('/admin/products/edit/save?id=' . $product->id_products) ?>" enctype="multipart/form-data">
    <div>
        <img class='small-blocked-image' src="<?php echo \App\Config\Config::url($product->image) ?>" />
        <label>Change Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <label>Name</label>
        <input type="text" name="nome" value="<?php echo $product->name ?>">
    </div>
    <div>
    <label>Select categories </label>
        <select name="categories[]" multiple>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category->id_categories ?>"><?php echo $category->name ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label>Price</label>
        <input type="text" name="price" value="<?php echo $product->price ?>">
    </div>
    <div>
        <label>Description</label>
        <textarea name="description"><?php echo $product->description ?></textarea>
    </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>