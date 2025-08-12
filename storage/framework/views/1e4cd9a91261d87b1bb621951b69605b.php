<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'data' => collect(), // По умолчанию пустая коллекция
    'model' => collect(), // По умолчанию пустая коллекция
    'emptyList' => '',
    'routeCardTitleLink' => '',
    'routeEditButton' => '',
    'formClassName' => ''
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'data' => collect(), // По умолчанию пустая коллекция
    'model' => collect(), // По умолчанию пустая коллекция
    'emptyList' => '',
    'routeCardTitleLink' => '',
    'routeEditButton' => '',
    'formClassName' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php if($data->isEmpty()): ?>
    <div class="empty-list">
        <p><?php echo e($emptyList); ?></p>
    </div>
<?php else: ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['update', 'delete'], $model)): ?>
        <div class="list" id="list">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card item">
                    <div class="card-title"><a class="card-title-link" href="<?php echo e(route($routeCardTitleLink, $element->id)); ?>"><?php echo e($element->title); ?></a></div>
                    <div class="card-actions">
                        <a class="button edit-button" href="<?php echo e(route($routeEditButton, $element->id)); ?>">✏️ Редактировать</a>
                        <form class="<?php echo e($formClassName); ?>">
                            <?php echo csrf_field(); ?> <!-- CSRF защита для Laravel, для других фреймворков может отличаться -->
                            <input type="hidden" name="id" value="<?php echo e($element->id); ?>">
                            <button type="submit" class="button delete-button">🗑️ Удалить</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="list" id="list">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card item">
                    <div class="card-title"><a class="card-title-link" href="<?php echo e(route($routeCardTitleLink, $element->id)); ?>"><?php echo e($element->title); ?></a></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!-- Диалог подтверждения удаления -->
<div class="confirmation-dialog" id="confirmationDialog">
    <div class="dialog-content">
        <h2>Подтверждение удаления</h2>
        <p id="confirmationMessage"></p>
        <div class="dialog-buttons">
            <button id="cancelDelete" class="button btn-back">Отмена</button>
            <button id="confirmDelete" class="button delete-button">Удалить</button>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/index.blade.php ENDPATH**/ ?>