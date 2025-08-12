<?php $__env->startSection('title', 'Просмотр страны'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-container">
        <div class="card-simple-card">
            <div class="card-info-section">
                <h2 class="card-view-title">Информация о стране</h2>
                <div class="card-info-content">
                    <div class="card-info-row">
                        <span class="card-info-label">Название:</span>
                        <span class="card-info-value"><?php echo e($country->title); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Добавляем список марок автомобилей -->
        <?php if($country->brands->count() > 0): ?>
            <div class="card-simple-card cars-list">
                <h2 class="card-view-title">Марки автомобилей этой страны</h2>
                <div class="list-container">
                    <?php $__currentLoopData = $country->brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('brands.show', [$brand->id])); ?>" class="list-item brand-link">
                            <div class="brand-title"><?php echo e($brand->title); ?></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-list">
                <p>Для этой страны марки автомобилей не добавлены</p>
            </div>
        <?php endif; ?>

        <!-- Кнопка возврата -->
        <?php if (isset($component)) { $__componentOriginalc1090ad177f6c7959235357c8bc3d844 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1090ad177f6c7959235357c8bc3d844 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backButton','data' => ['link' => ''.e(route('countries.index')).'','buttonName' => '← Вернуться к списку стран']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backButton'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('countries.index')).'','buttonName' => '← Вернуться к списку стран']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1090ad177f6c7959235357c8bc3d844)): ?>
<?php $attributes = $__attributesOriginalc1090ad177f6c7959235357c8bc3d844; ?>
<?php unset($__attributesOriginalc1090ad177f6c7959235357c8bc3d844); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1090ad177f6c7959235357c8bc3d844)): ?>
<?php $component = $__componentOriginalc1090ad177f6c7959235357c8bc3d844; ?>
<?php unset($__componentOriginalc1090ad177f6c7959235357c8bc3d844); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/countries/show.blade.php ENDPATH**/ ?>