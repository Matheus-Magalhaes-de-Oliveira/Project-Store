<h1>Form - Edit Categories</h1>


<form class="form" method="POST" action="<?php echo \App\Config\Config::url('/admin/categories/edit/save?id='. $categories->id_categorias )?>" enctype="multipart/form-data">

    <div>
        <label>New categories</label>
        <input type="text" name="name" value="<?php echo $categories->name?>">
    </div>
    
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>