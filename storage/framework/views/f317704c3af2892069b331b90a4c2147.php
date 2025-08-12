<?php $__env->startSection('title', 'Редактирование страны'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7d9aa7533b5858f61b260f8041033c80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9aa7533b5858f61b260f8041033c80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.headerContainer','data' => ['type' => 'simple','h1' => 'Редактирование страны']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('headerContainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'simple','h1' => 'Редактирование страны']); ?>
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

    <form id="countryForm">
        <?php echo csrf_field(); ?> <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->

        <input type="hidden" name="id" value="<?php echo e($country->id); ?>">

        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['label' => 'Название','name' => 'title','type' => 'text','placeholder' => 'Например: Италия','defaultValue' => ''.e($country->title ?? '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Название','name' => 'title','type' => 'text','placeholder' => 'Например: Италия','default-value' => ''.e($country->title ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginal8c3850065fda62946bd8f32c3360e497 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c3850065fda62946bd8f32c3360e497 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttonGroup','data' => ['class' => 'edit-button','link' => ''.e(route('countries.index')).'','btnBack' => '← Назад к списку','btnSubmit' => 'Сохранить']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttonGroup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'edit-button','link' => ''.e(route('countries.index')).'','btnBack' => '← Назад к списку','btnSubmit' => 'Сохранить']); ?>
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
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/edit.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/countries/edit.blade.php ENDPATH**/ ?>