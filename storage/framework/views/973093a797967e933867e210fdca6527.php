<?php if(session('message-info')): ?>
    <div class="flash-message flash-success">
        <?php echo e(session('message-info')); ?>

        <button class="flash-close-btn flash-close-btn--success">&times;</button>
    </div>
<?php endif; ?>
<?php if(session('message-warning')): ?>
    <div class="flash-message flash-warning">
        <?php echo e(session('message-warning')); ?>

        <button class="flash-close-btn flash-close-btn--warning">&times;</button>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel7\resources\views/components/notifications.blade.php ENDPATH**/ ?>