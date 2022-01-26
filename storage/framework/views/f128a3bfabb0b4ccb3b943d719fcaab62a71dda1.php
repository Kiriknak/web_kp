<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e($title ?? ''); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php
        $user = Auth::user();
    ?>
</head>

<body>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class=" relative mx-auto mt-auto ">
        <br class="lg:hidden">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views/layouts/main.blade.php ENDPATH**/ ?>