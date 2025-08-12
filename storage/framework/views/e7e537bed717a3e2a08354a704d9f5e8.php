<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon/steering-wheel-32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon/steering-wheel-16.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/auth.css']); ?>
</head>
<body>
<div class="main-container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo app('Tighten\Ziggy\BladeRouteGenerator')->generate(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/layouts/auth.blade.php ENDPATH**/ ?>