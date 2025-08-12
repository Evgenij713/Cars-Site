<?php $__env->startSection('title', 'Просмотр марки автомобиля'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-container">
        <div class="card-simple-card">
            <div class="card-info-section">
                <h2 class="card-view-title">Информация о марке автомобиля</h2>
                <div class="card-info-content">
                    <div class="card-info-row">
                        <span class="card-info-label">Страна:</span>
                        <span class="card-info-value"><?php echo e($brand->country->title); ?></span>
                    </div>
                    <div class="card-info-row">
                        <span class="card-info-label">Название:</span>
                        <span class="card-info-value"><?php echo e($brand->title); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Добавляем список автомобилей -->
        <?php if($brand->cars->count() > 0): ?>
            <div class="card-simple-card cars-list">
                <h2 class="card-view-title">Автомобили этой марки</h2>
                <div class="list-container">
                    <?php $__currentLoopData = $brand->cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('cars.show', [$car->id])); ?>" class="list-item car-link">
                            <div class="car-model"><?php echo e($car->model); ?></div>
                            <div class="car-vin"><?php echo e($car->vin); ?></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-list">
                <p>Для этой марки автомобилей пока нет</p>
            </div>
        <?php endif; ?>

        <!-- Кнопка возврата -->
        <?php if (isset($component)) { $__componentOriginalc1090ad177f6c7959235357c8bc3d844 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1090ad177f6c7959235357c8bc3d844 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backButton','data' => ['link' => ''.e(route('brands.index')).'','buttonName' => '← Вернуться к списку марок автомобилей']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backButton'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('brands.index')).'','buttonName' => '← Вернуться к списку марок автомобилей']); ?>
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

        <!-- Комментарии -->
        <?php if (isset($component)) { $__componentOriginald04b9949d0dada8faa8863322f9b06a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald04b9949d0dada8faa8863322f9b06a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.comments','data' => ['commentable' => $brand]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('comments'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['commentable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($brand)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald04b9949d0dada8faa8863322f9b06a8)): ?>
<?php $attributes = $__attributesOriginald04b9949d0dada8faa8863322f9b06a8; ?>
<?php unset($__attributesOriginald04b9949d0dada8faa8863322f9b06a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald04b9949d0dada8faa8863322f9b06a8)): ?>
<?php $component = $__componentOriginald04b9949d0dada8faa8863322f9b06a8; ?>
<?php unset($__componentOriginald04b9949d0dada8faa8863322f9b06a8); ?>
<?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/create.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/brands/show.blade.php ENDPATH**/ ?>