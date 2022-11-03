<h1>List - Users</h1>
<a href="<?php echo App\Config\Config::url("/admin/users/create") ?>">Create New User</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Created At</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user->id_user ?></td>
            <td><?php echo $user->fullname ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->type ?></td>
            <td><?php echo date('d/m/Y H:i:s', strtotime($user->created_at)) ?></td>
            <td>
                <a class="edit" href="<?php echo \App\Config\Config::url("/admin/users/edit?id=" . $user->id_user) ?>">Edit</a>
            </td>
            <td>
                <a class="delete" href="<?php echo \App\Config\Config::url("/admin/users/delete?id=" . $user->id_user) ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="<?php echo App\Config\Config::url("/admin/comments/create")?>">Create Comment</a>