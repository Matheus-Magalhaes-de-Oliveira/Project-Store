<h1>Form - Create Product</h1>

<form class="form" method="POST" action="<?php echo \App\Config\Config::url('/admin/products/create/save') ?>" enctype="multipart/form-data">

    <div>
        <label>Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <label>Name</label>
        <input type="text" name="nome">
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
        <input type="text" name="price">
    </div>
    <div>
        <label>Descricao</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>