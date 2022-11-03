<header>
    <section>
        <img class="logosvg" id="logo" src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" />
        <img class="logos" id="logosvg" src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" />

        <a href="<?php echo \App\Config\Config::url('/') ?>">Home</a>
        <a href="<?php echo \App\Config\Config::url('contact')?>">Contact</a>
        <a href="<?php echo \App\Config\Config::url('/admin/products/list-products')?>">List Product</a>
        <a href="<?php echo \App\Config\Config::url('/admin/categoires/list-categories')?>">List Categories</a>
        <a href="<?php echo \App\Config\Config::url('/admin/comments')?>">List Comments</a>
        <a href="<?php echo \App\Config\Config::url('/admin/comments/review')?>">Review Comments</a>
        <a href="<?php echo \App\Config\Config::url('/admin/users/list-users')?>">List Users</a>
    </section>
</header>