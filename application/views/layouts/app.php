<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Bakulan Store</title>
    <link rel="stylesheet" href="<?= base_url('/assets/libs/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('/assets/libs/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400&display=swap" rel="stylesheet"> 
</head>
<body>
    
    <?php 
        if($navbar){
            $this->load->view('layouts/_navbar');
        }
    ?>

    <!-- main -->
    <?php $this->load->view($page); ?>
    <!-- main -->
    
    <script src="<?= base_url('assets/libs/jquery/jquery-3.5.1.min.js') ?>"></script>
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url("assets/js/jquery.number.min.js") ?>"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script src="<?= base_url('assets/js/slug.js') ?>"></script>
</body>
</html>