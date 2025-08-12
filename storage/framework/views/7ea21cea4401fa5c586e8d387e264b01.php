<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'complex',  // 'simple' или 'complex',
    'h1' => '',
    'model' => collect(), // По умолчанию пустая коллекция
    'linkButton' => '#',
    'buttonName'  => '',
    'linkBasket' => '#'
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
    'type' => 'complex',  // 'simple' или 'complex',
    'h1' => '',
    'model' => collect(), // По умолчанию пустая коллекция
    'linkButton' => '#',
    'buttonName'  => '',
    'linkBasket' => '#'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($type === 'simple'): ?>
    <div class="header-container">
        <h1><?php echo e($h1); ?></h1>
    </div>
<?php else: ?>
    <div class="header-container">
        <h1 class="page-title"><?php echo e($h1); ?></h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $model)): ?>
            <div class="header-buttons">
                <a href="<?php echo e($linkButton); ?>" class="button btn-primary"><?php echo e($buttonName); ?></a>
                <?php if($linkBasket !== '#'): ?>
                    <a href="<?php echo e($linkBasket); ?>" class="button btn-trash">🗑️ Корзина</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/headerContainer.blade.php ENDPATH**/ ?>