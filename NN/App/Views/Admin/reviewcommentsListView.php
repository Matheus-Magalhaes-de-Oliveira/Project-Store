<h1>List - Comments</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Comment</th>
        <th>ID User</th>
        <th>Status</th>
        <th>Validation</th>
    </tr>
        <?php foreach ($comments as $comment) { ?>

        <tr>
            <td><?php echo $comment->id_comments?></td>
            <td><?php echo $comment->comments?></td>
            <td><?php echo $comment->users_id?></td>
            <td><?php echo $comment->status?></td>
            <td>
                <a class="edit" href="<?php echo \App\Config\Config::url("/admin/comments/accept?id=" . $comment->id_comments) ?>">Accept</a>
                <a class="delete" href="<?php echo \App\Config\Config::url("/admin/comments/discard?id=" . $comment->id_comments) ?>">Discard</a>
            </td>
        </tr>
    <?php } ?>
</table>