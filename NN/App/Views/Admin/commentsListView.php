<h1>List - Comments</h1>
<a href="<?php echo App\Config\Config::url("/admin/comments/create") ?>">Create New Comment</a>
<table class="table">
    <?php foreach ($comments as $comment) { ?>
    <tr>
        <th>ID</th>
        <th>Comment</th>
        <th>ID User</th>
    </tr>
        <tr>
            <td><?php echo $comment->id_comments  ?></td>
            <td><?php echo $comment->comments ?></td>
            <td><?php echo $comment->users_id   ?></td>  
        </tr>
    <?php } ?>
</table>