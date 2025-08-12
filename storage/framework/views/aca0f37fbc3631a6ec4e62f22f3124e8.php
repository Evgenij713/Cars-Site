<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label',
    'name',
    'type',
    'placeholder' => '',
    'defaultValue' => '',
    'min' => '',
    'maxlength' => ''
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
    'label',
    'name',
    'type',
    'placeholder' => '',
    'defaultValue' => '',
    'min' => '',
    'maxlength' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($type === 'checkbox'): ?>
    <div class="form-group checkbox-group">
        <input
            type="<?php echo e($type); ?>"
            id="<?php echo e($name); ?>"
            name="<?php echo e($name); ?>"
            min="<?php echo e($min); ?>"
            maxlength="<?php echo e($maxlength); ?>"
            placeholder="<?php echo e($placeholder); ?>"
        />
        <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    </div>
<?php else: ?>
    <div class="form-group">
        <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
        <input
            type="<?php echo e($type); ?>"
            id="<?php echo e($name); ?>"
            name="<?php echo e($name); ?>"
            min="<?php echo e($min); ?>"
            maxlength="<?php echo e($maxlength); ?>"
            placeholder="<?php echo e($placeholder); ?>"
            value="<?php echo e($defaultValue); ?>"
        />
        <div id="<?php echo e($name); ?>-error" class="error-message"></div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/input.blade.php ENDPATH**/ ?>