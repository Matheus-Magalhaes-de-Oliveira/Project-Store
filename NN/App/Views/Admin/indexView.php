<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo \App\Config\Config::$BASE_URL . 'assets/admin/admin.css' ?>" />
</head>

<body>

    <?php $this->view("headerView"); ?>

    <section id="content">
        <?php 
        if(isset($page)){
            $data = isset($data)?$data:[];
            $this->view($page, $data);
        }
        ?>
    </section>

</body>

</html>