<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'class' => '',
    'link' => '#',
    'btnBack' => '',
    'btnSubmit' => ''
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
    'class' => '',
    'link' => '#',
    'btnBack' => '',
    'btnSubmit' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="button-group">
    <a href="<?php echo e($link); ?>" class="btn btn-back"><?php echo e($btnBack); ?></a>
    <button type="submit" class="btn <?php echo e($class); ?>"><?php echo e($btnSubmit); ?></button>
</div>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/buttonGroup.blade.php ENDPATH**/ ?>