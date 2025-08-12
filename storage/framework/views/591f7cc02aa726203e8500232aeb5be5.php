<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label',
    'name',
    'options',
    'selectedOptions' => []
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
    'options',
    'selectedOptions' => []
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="form-group">
    <label><?php echo e($label); ?></label>
    <div class="options-container">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="option-checkbox">
                <input
                    type="checkbox"
                    id="option-<?php echo e($id); ?>"
                    name="<?php echo e($name); ?>[]"
                    value="<?php echo e($id); ?>"
                    <?php if(in_array($id, (array)$selectedOptions)): echo 'checked'; endif; ?>
                />
                <label for="option-<?php echo e($id); ?>"><?php echo e($option); ?></label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div id="<?php echo e($name); ?>-error" class="error-message"></div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/multiple-select.blade.php ENDPATH**/ ?>