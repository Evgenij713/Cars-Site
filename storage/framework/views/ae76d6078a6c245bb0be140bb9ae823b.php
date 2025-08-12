<!-- Секция комментариев -->
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'commentable' => collect(), // По умолчанию пустая коллекция
    'modelComment' => 'App\Models\Comment'
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
    'commentable' => collect(), // По умолчанию пустая коллекция
    'modelComment' => 'App\Models\Comment'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="comments-section">
    <h3 class="section-title">Комментарии</h3>

    <?php if($commentable->comments->count() > 0): ?>
        <div class="comments-list">
            <?php $__currentLoopData = $commentable->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-author"><?php echo e($comment->user->name); ?></span>
                        <span class="comment-date"><?php echo e($comment->created_at->format('d.m.Y H:i')); ?></span>
                    </div>
                    <div class="comment-body"><?php echo e($comment->body); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="no-comments">Пока нет комментариев. Будьте первым!</p>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $modelComment)): ?>
        <!-- Форма добавления комментария -->
        <div class="comment-form">
            <h4 class="form-title">Добавить комментарий</h4>
            <form id="commentForm">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea id ="body" name="body" class="form-control" rows="3" placeholder="Ваш комментарий..."></textarea>
                    <div id="body-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="commentable_id" value="<?php echo e($commentable->id); ?>"/>
                    <div id="commentable_id-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="commentable_type" value="<?php echo e($commentable->getTable()); ?>"/>
                    <div id="commentable_type-error" class="error-message"></div>
                </div>
                <button type="submit" class="button submit-button">Отправить</button>
            </form>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\laravel8\resources\views/components/comments.blade.php ENDPATH**/ ?>