<h1>Create Comments</h1>

<form class="form" method="POST" action="<?php echo \App\Config\Config::url('/admin/comments/create/save') ?>" enctype="multipart/form-data">

    <div>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Insert your email">
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Insert your password">
    </div>
    <div>
        <label>Comment:</label>
        <textarea name="comment" placeholder="Insert your comnment"></textarea>
    </div>
    <div>
        <button type="submit">Submit comment</button>
    </div>
</form>