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
    <?php if(!(Str::contains(url()->current(), 'dashboard')||
    (Str::contains(url()->current(), 'cart')||(Str::contains(url()->current(), 'checkout'))
    ))): ?>
    <footer class="mt-10">
        <div class="bg-gray-100">
            <div class="max-w-screen-xl py-10 px-4 sm:px-6 text-yellow-800 sm:flex justify-between mx-auto">
                <div class="p-5 sm:w-8/12">
                    <h3 class="font-bold text-3xl text-indigo-600 mb-4">UD. Panama</h3>

                    <div class="flex text-gray-500 uppercase text-sm ">
                        <a href="/" class="mr-2 hover:text-indigo-600">Home</a>
                        <a href="#" class="mr-2 hover:text-indigo-600">About Us</a>
                        <a href="#" class="mr-2 hover:text-indigo-600">Contact Us</a>
                        <a href="#" class="mr-2 hover:text-indigo-600">Support Us</a>
                    </div>

                </div>
            </div>
            <div class="flex py-5 m-auto mt-3 text-gray-800 text-sm flex-col items-center border-t max-w-screen-xl">
                <p>© Copyright 2020. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <?php endif; ?>

    <script type="text/javascript">
        function remove(e) {
            e.parentNode.removeChild(e);
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views/layouts/main.blade.php ENDPATH**/ ?>