<?php $__env->startSection('title', 'Каталог автомобилей'); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal7d9aa7533b5858f61b260f8041033c80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d9aa7533b5858f61b260f8041033c80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.headerContainer','data' => ['type' => 'complex','model' => $modelCar,'h1' => 'Каталог автомобилей','linkButton' => ''.e(route('cars.create')).'','buttonName' => '+ Добавить автомобиль','linkBasket' => ''.e(route('cars.trash')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('headerContainer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'complex','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($modelCar),'h1' => 'Каталог автомобилей','linkButton' => ''.e(route('cars.create')).'','buttonName' => '+ Добавить автомобиль','linkBasket' => ''.e(route('cars.trash')).'']); ?>
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

    <?php if($cars->isEmpty()): ?>
        <div class="empty-list">
            <p>Автомобили отсутствуют</p>
        </div>
    <?php else: ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAll', $modelCar)): ?>
            <div class="catalog" id="catalog">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="car-card" href="<?php echo e(route('cars.show', [$car->id])); ?>">
                        <div class="car-status status-<?php echo e(strtolower($car->status->name)); ?>">
                            <span class="status-label">Статус:</span>
                            <?php echo e($car->status->text()); ?>

                        </div>
                        <div class="car-make"><?php echo e($car->brand->title); ?></div>
                        <div class="car-model"><?php echo e($car->model); ?></div>
                        <div class="car-country">Страна: <?php echo e($car->brand->country->title); ?></div>
                        <div class="price-label">Цена:</div>
                        <div class="car-price-card"><?php echo e(number_format($car->price, 0, ',', ' ')); ?> руб.</div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="catalog" id="catalog">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="car-card" href="<?php echo e(route('cars.show', [$car->id])); ?>">
                        <div class="car-make"><?php echo e($car->brand->title); ?></div>
                        <div class="car-model"><?php echo e($car->model); ?></div>
                        <div class="car-country">Страна: <?php echo e($car->brand->country->title); ?></div>
                        <div class="price-label">Цена:</div>
                        <div class="car-price-card"><?php echo e(number_format($car->price, 0, ',', ' ')); ?> руб.</div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/cars/index.blade.php ENDPATH**/ ?>