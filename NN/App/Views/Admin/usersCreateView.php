<h1>Form - Create User</h1>

<form class="form" method="POST" action="<?php echo \App\Config\Config::url('/admin/users/create/save') ?>" enctype="multipart/form-data">

    <div>
        <label>Full Name</label>
        <input type="text" name="fullname">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label>Type</label>
        <select name="type">
            <option value="Admin"> Admin</option>
            <option value="Client"> Client</option>
        </select>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>