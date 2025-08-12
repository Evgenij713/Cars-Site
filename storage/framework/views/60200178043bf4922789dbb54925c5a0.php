<?php $__env->startSection('title', 'Просмотр тега'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card-container">
        <div class="card-simple-card">
            <div class="card-info-section">
                <h2 class="card-view-title">Информация о теге</h2>
                <div class="card-info-content">
                    <div class="card-info-row">
                        <span class="card-info-label">Название:</span>
                        <span class="card-info-value"><?php echo e($tag->title); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Добавляем список автомобилей -->
        <?php if($tag->cars->count() > 0): ?>
            <div class="card-simple-card cars-list">
                <h2 class="card-view-title">Автомобили этого тега</h2>
                <div class="list-container">
                    <?php $__currentLoopData = $tag->cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('cars.show', [$car->id])); ?>" class="list-item car-link">
                            <div class="car-model"><?php echo e($car->model); ?></div>
                            <div class="car-vin"><?php echo e($car->vin); ?></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-list">
                <p>У этого тега автомобилей пока нет</p>
            </div>
        <?php endif; ?>

        <!-- Кнопка возврата -->
        <?php if (isset($component)) { $__componentOriginalc1090ad177f6c7959235357c8bc3d844 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1090ad177f6c7959235357c8bc3d844 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backButton','data' => ['link' => ''.e(route('tags.index')).'','buttonName' => '← Вернуться к списку тегов']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('backButton'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('tags.index')).'','buttonName' => '← Вернуться к списку тегов']); ?>
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

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/tags/show.blade.php ENDPATH**/ ?>