<a href="<?php echo e(route('admins.edit', Auth::user()->id)); ?>" class="admin-info">
    <div class="avatar">
    	<?php if(Auth::user()->getMedia('avatars')->first()): ?>
    		<img src="<?php echo e(Auth::user()->getMedia('avatars')->first()->getUrl('thumb')); ?>">
    	<?php else: ?>
    		<img src="<?php echo e(asset('admin/images/user.png')); ?>">
    	<?php endif; ?>
    </div>
    <div class="admin-data">
        <p class="admin-name"><?php echo e(Auth::user()->name); ?></p>
        <p class="admin-mail"><?php echo e(Auth::user()->email); ?></p>
    </div>
</a>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/admin/partials/top.blade.php ENDPATH**/ ?>