<h1>Form - Create Categories</h1>


<form class="form" method="POST" action="<?php echo \App\Config\Config::url("/admin/categories/create/save")?>" enctype="multipart/form-data">

    <div>
        <label>New categories</label>
        <input type="text" name="name">
    </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>