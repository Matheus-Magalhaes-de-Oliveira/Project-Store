<h1>Edit - User</h1>

<form class="form" method="POST" action="<?php echo \App\Config\Config::url('/admin/users/edit/save?id=' . $users->id_user) ?>" enctype="multipart/form-data">

    <div>
        <label>Name</label>
        <input type="text" name="fullname" value="<?php echo $users->fullname ?>">
    </div>
    <div>
        <label>Price</label>
        <input type="text" name="email" value="<?php echo $users->email ?>">
    </div>
    <div>
        <label>Type</label>
        <select name="type">
            <option value="Admin"> Admin</option>
            <option value="Client" selected> Client</option>
        </select>
    </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>