<?php $__env->startSection('title', 'Добавить марку автомобиля'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7d9aa7533b5858f61b260f8041033c80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9aa7533b5858f61b260f8041033c80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.headerContainer','data' => ['type' => 'simple','h1' => 'Добавить новую марку автомобиля']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('headerContainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'simple','h1' => 'Добавить новую марку автомобиля']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d9aa7533b5858f61b260f8041033c80)): ?>
<?php $attributes = $__attributesOriginal7d9aa7533b5858f61b260f8041033c80; ?>
<?php unset($__attributesOriginal7d9aa7533b5858f61b260f8041033c80); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9aa7533b5858f61b260f8041033c80)): ?>
<?php $component = $__componentOriginal7d9aa7533b5858f61b260f8041033c80; ?>
<?php unset($__componentOriginal7d9aa7533b5858f61b260f8041033c80); ?>
<?php endif; ?>

    <form id="brandForm">
        <?php echo csrf_field(); ?> <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <?php echo $__env->make('brands.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php if (isset($component)) { $__componentOriginal8c3850065fda62946bd8f32c3360e497 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c3850065fda62946bd8f32c3360e497 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttonGroup','data' => ['class' => 'btn-primary','link' => ''.e(route('brands.index')).'','btnBack' => '← Назад к списку','btnSubmit' => 'Добавить марку']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttonGroup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-primary','link' => ''.e(route('brands.index')).'','btnBack' => '← Назад к списку','btnSubmit' => 'Добавить марку']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c3850065fda62946bd8f32c3360e497)): ?>
<?php $attributes = $__attributesOriginal8c3850065fda62946bd8f32c3360e497; ?>
<?php unset($__attributesOriginal8c3850065fda62946bd8f32c3360e497); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c3850065fda62946bd8f32c3360e497)): ?>
<?php $component = $__componentOriginal8c3850065fda62946bd8f32c3360e497; ?>
<?php unset($__componentOriginal8c3850065fda62946bd8f32c3360e497); ?>
<?php endif; ?>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/create.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/brands/create.blade.php ENDPATH**/ ?>