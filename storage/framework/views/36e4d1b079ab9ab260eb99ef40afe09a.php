
<?php $__env->startSection('title', 'Обзор автомобиля'); ?>
<?php $__env->startSection('content'); ?>
    <div class="car-detail-card">
        <div class="car-header">
            <div class="car-title" id="carTitle"><?php echo e($car->brand->title); ?> <?php echo e($car->model); ?></div>
            <div class="car-header-price" id="carPrice"><?php echo e($car->price); ?> руб.</div>
        </div>

        <div class="car-content">
            <div class="car-info">
                <div class="info-section">
                    <div class="info-title">Основная информация</div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAll', $car)): ?>
                        <div class="info-row">
                            <div class="info-label">Статус:</div>
                            <div class="info-value">
                                <span class="status-badge status-<?php echo e(strtolower($car->status->name)); ?>">
                                    <?php echo e($car->status->text()); ?>

                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="info-row">
                        <div class="info-label">Страна:</div>
                        <div class="info-value"><?php echo e($car->brand->country->title); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Марка:</div>
                        <div id="carBrand" class="info-value"><?php echo e($car->brand->title); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Модель:</div>
                        <div id="carModel" class="info-value"><?php echo e($car->model); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Цена:</div>
                        <div class="info-value"><?php echo e($car->price); ?> руб.</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Трансмиссия:</div>
                        <div class="info-value">
                            <span class="transmission-badge transmission-<?php echo e($car->transmission); ?>">
                                <?php echo e($transmissions[$car->transmission]); ?>

                            </span>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">VIN-код:</div>
                        <div class="info-value"><?php echo e($car->vin); ?></div>
                    </div>
                    <?php if($car->tags->isNotEmpty()): ?>
                        <div class="info-row">
                            <div class="info-label">Теги:</div>
                            <div class="info-value">
                                <div class="tags-container">
                                    <?php $__currentLoopData = $car->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="tag"><?php echo e($tag->title); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Группа кнопок (Назад + Редактировать + Удалить) -->
    <div class="button-group">
        <a href="<?php echo e(route('cars.index')); ?>" class="button back-button">← Вернуться в каталог</a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['update', 'delete'], $car)): ?>
            <a href="<?php echo e(route('cars.edit', [$car->id])); ?>" class="button edit-button">✏️ Редактировать</a>
            <?php if($car->canDelete): ?>
                <form class="carForm">
                    <?php echo csrf_field(); ?> <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->
                    <input type="hidden" name="id" value="<?php echo e($car->id); ?>">
                    <button type="submit" class="button delete-button">🗑️ Удалить</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['update', 'delete'], $car)): ?>
        <!-- Диалог подтверждения удаления -->
        <div class="confirmation-dialog" id="confirmationDialog">
            <div class="dialog-content">
                <h2>Подтверждение удаления</h2>
                <p id="confirmationMessage"></p>
                <div class="dialog-buttons">
                    <button id="cancelButton" class="button back-button">Отмена</button>
                    <button id="confirmDelete" class="button delete-button">Удалить</button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Комментарии -->
    <?php if (isset($component)) { $__componentOriginald04b9949d0dada8faa8863322f9b06a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald04b9949d0dada8faa8863322f9b06a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.comments','data' => ['commentable' => $car]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('comments'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['commentable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($car)]); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/delete.js', 'resources/js/create.js']); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel8\resources\views/cars/show.blade.php ENDPATH**/ ?>