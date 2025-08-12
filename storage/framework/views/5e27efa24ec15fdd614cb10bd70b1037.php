<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon/steering-wheel-32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon/steering-wheel-16.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')([
    'resources/css/app.css',
    'resources/css/cars.css'
    ]); ?>
</head>
<body>
<div class="main-container">

    <nav class="main-nav">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="<?php echo e(route('home')); ?>" class="nav-link <?php if(request()->routeIs('home')): ?> active <?php endif; ?>">
                    <i class="fa-sharp fa-solid fa-house"></i> Главная
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('cars.index')); ?>" class="nav-link <?php if(request()->routeIs('cars.*')): ?> active <?php endif; ?>">
                    <i class="fa-sharp fa-solid fa-car-side"></i> Автомобили
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('brands.index')); ?>" class="nav-link <?php if(request()->routeIs('brands.*')): ?> active <?php endif; ?>">
                    <i class="fa-sharp fa-solid fa-star"></i> Марки
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('countries.index')); ?>" class="nav-link <?php if(request()->routeIs('countries.*')): ?> active <?php endif; ?>">
                    <i class="fa-sharp fa-solid fa-globe"></i> Страны
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('tags.index')); ?>" class="nav-link <?php if(request()->routeIs('tags.*')): ?> active <?php endif; ?>">
                    <i class="fa-sharp fa-solid fa-hashtag"></i> Теги
                </a>
            </li>
        </ul>

        <div class="user-auth-section">
            <?php if(auth()->guard()->check()): ?>
                <div class="user-info" style="display: flex; align-items: center;">
                    <span class="user-name"><?php echo e(Auth::user()->name); ?></span>
                    <div class="user-roles">
                        <?php $__currentLoopData = Auth::user()->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-role-icon">
                                <i class="fa-sharp fa-solid fa-key"></i>
                                <span class="user-role-tooltip"><?php echo e($role->name); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <form id="logoutForm" class="logout-form">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="logout-link"><i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i> Выход</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login.index')); ?>" class="login-link"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i> Вход</a>
            <?php endif; ?>
        </div>
    </nav>

    <?php if (isset($component)) { $__componentOriginale5bc9b34dd139a393f71cdc403b71855 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale5bc9b34dd139a393f71cdc403b71855 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.notifications','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale5bc9b34dd139a393f71cdc403b71855)): ?>
<?php $attributes = $__attributesOriginale5bc9b34dd139a393f71cdc403b71855; ?>
<?php unset($__attributesOriginale5bc9b34dd139a393f71cdc403b71855); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale5bc9b34dd139a393f71cdc403b71855)): ?>
<?php $component = $__componentOriginale5bc9b34dd139a393f71cdc403b71855; ?>
<?php unset($__componentOriginale5bc9b34dd139a393f71cdc403b71855); ?>
<?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo app('Tighten\Ziggy\BladeRouteGenerator')->generate(); ?>
<?php if(auth()->guard()->check()): ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/logout.js']); ?>
<?php endif; ?>
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/flash.js']); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/layouts/main.blade.php ENDPATH**/ ?>