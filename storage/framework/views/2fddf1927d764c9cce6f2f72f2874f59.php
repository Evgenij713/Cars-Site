<?php $__env->startSection('title', 'Корзина с удаленными автомобилями'); ?>
<?php $__env->startSection('content'); ?>
    <div class="header-container">
        <h1 class="page-title">Корзина с удаленными автомобилями</h1>
        <div class="button-group">
            <a href="<?php echo e(route('cars.index')); ?>" class="button btn-back">← Назад к каталогу</a>
        </div>
    </div>
    <?php if($cars->isEmpty()): ?>
        <div class="empty-trash">
            <p>Корзина пуста</p>
        </div>
    <?php else: ?>
        <div class="catalog" id="catalog">
            <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="car-card">
                    <div class="car-make"><?php echo e($car->make); ?></div>
                    <div class="car-model"><?php echo e($car->model); ?></div>
                    <div class="car-vin"><?php echo e($car->vin); ?></div>
                    <div class="car-status status-<?php echo e(strtolower($car->status->name)); ?>">
                        <span class="status-label">Статус при удалении:</span>
                        <?php echo e($car->status->text()); ?>

                    </div>
                    <div class="price-label">Цена:</div>
                    <div class="car-price-card"><?php echo e(number_format($car->price, 0, ',', ' ')); ?> руб.</div>
                    <div class="car-actions">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restore', $car)): ?>
                            <form class="action-form" data-car-id="<?php echo e($car->id); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="button btn-restore">Восстановить</button>
                            </form>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('forceDelete', $modelCar)): ?>
                            <form class="action-form" data-car-id="<?php echo e($car->id); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="button btn-delete-permanently">Удалить</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <!-- Диалог подтверждения удаления -->
    <div class="confirmation-dialog" id="confirmationDialog">
        <div class="dialog-content">
            <h2>Подтверждение удаления</h2>
            <p>Вы уверены, что хотите окончательно удалить этот автомобиль? Это действие нельзя отменить.</p>
            <div class="dialog-buttons">
                <button class="button btn-back" id="cancelDelete">Отмена</button>
                <button class="button delete-button" id="confirmDelete">Удалить</button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/trash.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/cars/trash.blade.php ENDPATH**/ ?>