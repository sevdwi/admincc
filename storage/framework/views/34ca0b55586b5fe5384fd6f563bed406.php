<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Command Center'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="<?php echo e(asset('css/gaya-isi.css')); ?>">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <style>
    body {
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url("<?php echo e(asset('images/cc-gemini.png')); ?>");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    margin: 0;
    }
</style> -->
</head>
<body>
<main>
    <nav>
        <ul class="navbar nav nav-pills nav-fill">
            <li class="nav-item welcome-text">
                <h4 class="nav-link text-uppercase text-white">Halo, <?php echo e(auth()->user()->name); ?></h4>
            </li>
            <li class="nav-item">
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button class=" nav-link btn btn-danger rounded-pill px-3 text-white" type="submit">
                Logout
                </button>
            </form>
            </li>
        </ul>
    </nav>
    
    <div class="map-bg"></div>
        <div class="lines-bg"></div>
        <div class="dot dot-1"></div>
        <div class="dot dot-2"></div>
        <div class="dot dot-3"></div>
        <div class="dot dot-4"></div>

        <?php echo $__env->yieldContent('content'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- <script src="<?php echo e(asset('js/particle.js')); ?>"></script> -->

</main>
</body>
</html><?php /**PATH C:\xampp_PHP8\htdocs\admincc\resources\views/layouts/head-isi.blade.php ENDPATH**/ ?>