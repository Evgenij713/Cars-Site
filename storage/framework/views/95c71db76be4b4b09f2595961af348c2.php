<?php $__env->startSection('title', 'Список стран'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7d9aa7533b5858f61b260f8041033c80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9aa7533b5858f61b260f8041033c80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.headerContainer','data' => ['type' => 'complex','model' => $modelCountry,'h1' => 'Список стран','linkButton' => ''.e(route('countries.create')).'','buttonName' => '+ Добавить страну']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('headerContainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'complex','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($modelCountry),'h1' => 'Список стран','linkButton' => ''.e(route('countries.create')).'','buttonName' => '+ Добавить страну']); ?>
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
    <?php if (isset($component)) { $__componentOriginald31b976ffc6119d1bd7af7af86b24220 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald31b976ffc6119d1bd7af7af86b24220 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.index','data' => ['data' => $countries,'model' => $modelCountry,'emptyList' => 'Страны отсутствуют','routeCardTitleLink' => 'countries.show','routeEditButton' => 'countries.edit','formClassName' => 'countryForm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($countries),'model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($modelCountry),'emptyList' => 'Страны отсутствуют','routeCardTitleLink' => 'countries.show','routeEditButton' => 'countries.edit','formClassName' => 'countryForm']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald31b976ffc6119d1bd7af7af86b24220)): ?>
<?php $attributes = $__attributesOriginald31b976ffc6119d1bd7af7af86b24220; ?>
<?php unset($__attributesOriginald31b976ffc6119d1bd7af7af86b24220); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald31b976ffc6119d1bd7af7af86b24220)): ?>
<?php $component = $__componentOriginald31b976ffc6119d1bd7af7af86b24220; ?>
<?php unset($__componentOriginald31b976ffc6119d1bd7af7af86b24220); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/delete.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/countries/index.blade.php ENDPATH**/ ?>