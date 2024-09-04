<div class="adresses-flex <?php echo e($class ?? ''); ?>">
    <div class="adresses-info">
        <p class="adress-item"><?php echo e($title); ?></p>
        <p class="adress-ex"><input type="text" disabled value="<?php echo e($value); ?>"></p>
        <?php if(isset($copy)): ?>
            <div class="copy"><label for="cop5" class="label-svg">copy</label></div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/components/address.blade.php ENDPATH**/ ?>