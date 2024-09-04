<?php $__env->startSection('header'); ?>
	<div class="header header-users" style="top: 0">
	    <div class="inner">
            <a href="/" class="logo"><img src="<?php echo e(asset('admin/images/logoadmin.png')); ?>"></a>
	         <div class="cms">CMS</div>
	    </div>
	    <div class="search">
	        <form action="" method="">
	            <div class="search-group">
	                <input type="text" value="<?php echo e(request()->input('s')); ?>" name="s" placeholder="ID Пользователя или трек" class="input-search" />
	                <button class="button-search" type="submit"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4137 9.22526H10.7554L10.5221 9.00026C11.3387 8.05026 11.8304 6.81693 11.8304 5.47526C11.8304 2.48359 9.4054 0.0585938 6.41374 0.0585938C3.42207 0.0585938 0.99707 2.48359 0.99707 5.47526C0.99707 8.46693 3.42207 10.8919 6.41374 10.8919C7.7554 10.8919 8.98874 10.4003 9.93874 9.58359L10.1637 9.81693V10.4753L14.3304 14.6336L15.5721 13.3919L11.4137 9.22526ZM6.41374 9.22526C4.33874 9.22526 2.66374 7.55026 2.66374 5.47526C2.66374 3.40026 4.33874 1.72526 6.41374 1.72526C8.48874 1.72526 10.1637 3.40026 10.1637 5.47526C10.1637 7.55026 8.48874 9.22526 6.41374 9.22526Z" fill="#333333"/></svg>
	                </button>
	            </div>
	        </form>
	    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="content-wrap">
        <div class="content">

    	    <div class="content-top">
                <div class="content-head_wrap">
                    <div class="content-head">
            	        Транзакции
            	    </div>

            	    <div class="content-text">
            	        Список проведенных транзакций
            	    </div>
                </div>
        	    <div class="buttons-top" style="left: 300px;right: auto;">
                    <form action="" id="city">
                        <input type="hidden" name="s" value="<?php echo e(request('s')); ?>">
                        <div style="display: inline-block">
                            <label>c <input type="date" name="ds" value="<?php echo e(request('ds')); ?>"></label>
                            <label>по <input type="date" name="de" value="<?php echo e(request('de')); ?>"></label>
                        </div>
                    </form>
                </div>
            </div>


    	    <form action="<?php echo e(route('parcels.delete')); ?>" method="POST">
    	    	<?php echo csrf_field(); ?>
    	        <table class="table tablebordered">
    	            <thead>
    	                <tr>
    	                    <td><p class="table-items">id платежа</p></td>
    	                    <td><p class="table-items">Код банка</p></td>
                            <td><p class="table-items">Пользователь</p></td>
                            <td><p class="table-items">Трек</p></td>
    	                    <td><p class="table-items">Дата</p></td>
    	                    <td><p class="table-items">сумма USD</p></td>
    	                    <!--<td><p class="table-items">Тенге</p></td>-->
    	                    <!--<td><p class="table-items">Баланс</p></td>-->
    	                </tr>
    	            </thead>
    	            <tbody>
    	            	<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	                <tr>
                            <td style="font-weight: 700"><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->order); ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                                    <a class="usedit" href="<?php echo e(route('users.edit', $item->user_id)); ?>"><?php echo e($item->user_id); ?></a>
                                <?php else: ?>
                                    <?php echo e($item->user_id); ?>

                                <?php endif; ?>
                            </td>
    	                    <td>
                                <?php echo e($item->parcel->track ?? ''); ?>

                                <?php $__currentLoopData = $item->parcels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($parcel->track); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
    	                    <td><?php echo e($item->created_at->format('d.m.Y')); ?></td>
    	                    <td><?php echo e($item->count); ?></td>
    	                    <td class="hide"><?php echo e($item->tenge); ?></td>
                            <td class="hide" style="font-weight: normal"><?php echo e($item->user->balance ?? ''); ?></td>
    	                </tr>
    	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	            </tbody>
    	        </table>
    	    </form>
            <?php echo e($items->links()); ?>

    	</div>


    </div>

	<script>
		$(function(){
			$('#city select,#city input').change(function () {
				$('#city').submit();
			});
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

		    $('button.delete').click(function(){
		    	$('#ch-only-'+$(this).data('id')).prop('checked',true);
		    	$(this).parents('form').submit();
		    });

		    $('.buttons-top .snd_form ').click(function(e){
		    	e.preventDefault();
		    	$(this).next().click();
		    });

		    $(".buttons-top [name=file]").change(function () {
			    $(this).next().click();
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/admin/ind/transactions.blade.php ENDPATH**/ ?>