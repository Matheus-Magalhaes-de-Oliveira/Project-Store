<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Store</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo \App\Config\Config::$BASE_URL . 'assets/style.css' ?>" />
</head>

<body>

    <?php $this->view("headerView"); ?>

    <section id="content">
        <?php
        if (isset($page)) {
            $this->view($page);
        }
        ?>
    </section>

    <?php $this->view("footerView"); ?>

</body>

</html>