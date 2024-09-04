<?php $__env->startSection('content'); ?>


<div class="content-wrap">
    
    <div class="content">
        
        <div class="content-top">
            <div class="content-head_wrap">
                <div class="content-head">
        	        Администрирование
        	    </div>
        	    
        	    <div class="content-text">
        	        Список сотрудников
        	    </div>
            </div>
    	    <div class="buttons-top">
        		<!--<form action="">
                	<a class="createrole" href="<?php echo e(route('roles.index')); ?>">Роли</a>
                </form>-->
                <form action="">
                	<a class="createuser" href="<?php echo e(route('admins.create')); ?>">Добавить пользователя +</a>
                </form>
        	</div>
        </div>
    
        
        
        
	<div class="main-content">
	    <form action="<?php echo e(route('admins.delete')); ?>" method="POST">
	    	<?php echo csrf_field(); ?>
	        <table class="table tablebordered">
	            <thead>
	                <tr>
	                    <td class="checks"> 
	                        <div class="check-group">
	                            <div class="custom-control custom-checkbox">
	                                <input type="checkbox" class="custom-control-input checkbox" id="ch-all">
	                                <label class="custom-control-label" for="ch-all"></label>
	                            </div>
	                            <svg width="5" height="4" viewBox="0 0 5 4" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 4L4.66506 0.25H0.334936L2.5 4Z" fill="#333333"/></svg>
	                            <div class="buttons-hidden">
	                                <button type="submit">Все (на этой странице)</button>
	                                <button type="submit">Все (на всех страницах)</button>
	                            </div>
	                        </div>
	                    </td>
	                    <td>
	                        <div class="select-delete">
	                            <p class="selected">Выбранo: <span class="count-delete">0</span></p>
	                            <button type="submit" class="del">Удалить <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.98307 12.737C4.98307 13.4703 5.58307 14.0703 6.31641 14.0703H11.6497C12.3831 14.0703 12.9831 13.4703 12.9831 12.737V4.73698H4.98307V12.737ZM13.6497 2.73698H11.3164L10.6497 2.07031H7.31641L6.64974 2.73698H4.31641V4.07031H13.6497V2.73698Z" fill="#DC1E52"/></svg></button>
	                        </div>
	                    </td>
	                    <td>
	                        <p class="table-items">Email</p>
	                    </td>
	                    <td>
	                        <p class="table-items">Роль</p>
	                    </td>
	                    <td></td>
	                </tr>
	            </thead>
	            <tbody>
	            	<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <tr>
	                    <td class="checks">
	                        <div class="default-checkbox">
	                            <input type="checkbox" class="custom-control-input checkbox" id="ch-only-<?php echo e($item->id); ?>" name="id[]" value="<?php echo e($item->id); ?>">
	                            <label class="custom-control-label" for="ch-only-<?php echo e($item->id); ?>"></label>
	                        </div>
	                    </td>
	                    <td>
	                    	<?php if($item->getMedia('avatars')->first()): ?>
	                    		<img src="<?php echo e($item->getMedia('avatars')->first()->getUrl('mini-thumb')); ?>" class="admins">
	                    	<?php endif; ?>
	                    	<?php echo e($item->name); ?>

	                    </td>
	                    <td><a href="mailto:<?php echo e($item->email); ?>"><?php echo e($item->email); ?></a></td>
	                    <td><?php echo e(count($item->roles->toArray())?$item->roles[0]->title:''); ?></td>
	                    <td><a class="usedit" href="<?php echo e(route('admins.edit', $item->id)); ?>">Редактировать</a></td>
	                </tr>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </tbody>
	        </table>
	    </form>
	</div>
        
    </div>
    
</div>

	
	<script>
		$(function(){
		    $('#ch-all').change(function () {
		      if($(this).is(':checked')){
		        $('tbody .checks .checkbox').prop('checked',true);
		      }else{
		        $('tbody .checks .checkbox').prop('checked',false);
		      }
		      $('.count-delete').html($('tbody .checks .checkbox:checked').length);
		    });

		    $('tbody .checks .checkbox').change(function () {
		      if($('tbody .checks .checkbox').length == $('tbody .checks .checkbox:checked').length)
		        $('#ch-all').prop('checked',true);
		      else
		        $('#ch-all').prop('checked',false);
		      $('.count-delete').html($('tbody .checks .checkbox:checked').length);
		    });
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/admin/admins/index.blade.php ENDPATH**/ ?>