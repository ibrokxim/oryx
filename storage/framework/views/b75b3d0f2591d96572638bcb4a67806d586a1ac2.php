<?php
  $title = 'Данные получателя';
?>

<?php $__env->startSection('content'); ?>


<form method="POST" enctype="multipart/form-data" action="<?php echo e($item->id?route('recipients.update', $item->id):route('recipients.store', $item->id)); ?>">
	<input type="hidden" name="user_id" value="<?php echo e($item->user_id?$item->user_id:1); ?>">
			<?php echo csrf_field(); ?>
	        <?php if($item->id): ?>
	          <?php echo method_field('PUT'); ?>
	        <?php endif; ?>

	<div class="content-wrap">
	    <div class="buttons-top">
    	   <button type="submit" class="save">
    	        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.67902 0.46875H11.4909L13.9249 2.97016V12.7147C13.9249 13.4661 13.3157 14.0753 12.5643 14.0753H1.67902C0.927546 14.0753 0.318359 13.4661 0.318359 12.7147V1.82941C0.318359 1.07794 0.927546 0.46875 1.67902 0.46875ZM10.5233 1.83011V5.91208H3.72002V1.83011H1.67904V12.7154H3.03969V7.27274H11.2036V12.7154H12.5643V3.52362L10.9164 1.83011H10.5233ZM5.07843 4.55142V1.83011H9.1604V4.55142H5.07843ZM4.40039 8.63349V12.7155H9.84302V8.63349H4.40039ZM8.4824 2.51045H7.12174V3.8711H8.4824V2.51045Z" fill="white"/></svg>
                Сохранить
            </button>
            <a class="go-back" href="<?php echo e(route('recipients.index')); ?>">
                Назад
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.734375 7.99988L9.49987 15.6697V11.2264C12.258 10.9323 14.5383 11.7168 16.4106 13.5891L17.8332 15.0117V12.9999C17.8332 7.7786 14.9571 4.94273 9.49987 4.68574V0.330078L0.734375 7.99988ZM3.26537 7.9999L7.83322 4.00304V6.33323H8.66655C13.0004 6.33323 15.3753 7.87575 15.9988 11.097C13.8795 9.67865 11.375 9.20365 8.52955 9.6779L7.83322 9.79396V11.9968L3.26537 7.9999Z" fill="white"/></svg>
            </a>
        </div>

        <div class="content content-inner">

    	        <div class="profiles">
    	            <div class="prof-head"><?php echo e($title); ?></div>
    	            <div class="prof-inputs flex flex-wrap ">
    					<div class="new-flex w-two">
    	                    <p class="input-name">Имя</p>
    	                    <input type="text" name="name" value="<?php echo e(old('name', $item->name)); ?>"/>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Фамилия</p>
    	                    <input type="text" name="surname" value="<?php echo e(old('surname', $item->surname)); ?>"/>
    	                </div>
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Отчество</p>
    	                    <input type="text" name="fname" value="<?php echo e(old('fname', $item->fname)); ?>"/>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Страна</p>
    	                    <input type="text" name="country" value="<?php echo e(old('country', $item->country)); ?>"/>
    	                </div>
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Номер уд-ния личности</p>
    	                    <input type="text" name="pnum" value="<?php echo e(old('pnum', $item->pnum)); ?>"/>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Кем выдан</p>
    	                    <input type="text" name="pby" value="<?php echo e(old('pby', $item->pby)); ?>"/>
    	                </div>
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Дата выдачи</p>
    	                    <input type="text" name="pdate" value="<?php echo e(old('pdate', $item->pdate)); ?>"/>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Город</p>
    	                    <input type="text" name="city" value="<?php echo e(old('city', $item->city)); ?>"/>
    	                </div>
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Телефон</p>
    	                    <input type="text" name="phone" value="<?php echo e(old('phone', $item->phone)); ?>"/>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Адрес</p>
    	                    <input type="text" name="address" value="<?php echo e(old('address', $item->address)); ?>"/>
    	                </div>
    	                <div class="new-flex w-two flex flex-wrap">
    	                    <p class="input-name">Подтвержден</p>
    	                    <div class="new-flex_check">
        	                    <input type="hidden" name="confirm" value="0">
        	                    <input type="checkbox" name="confirm" value="1" <?php echo e($item->confirm?'checked':''); ?>/>
        	                    <label class="new-flex_check_label"></label>
    	                    </div>
    	                </div>

                        <?php if($item->files): ?>
                            <?php $__currentLoopData = json_decode($item->files, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="" style="width: 49%;">
                                    <a target="_blank" class="input-name" style="display: block; " href="/panel/recipient/file/<?php echo e($item->id); ?>/<?php echo e($key); ?>">
                                        <img src="/panel/recipient/file/<?php echo e($item->id); ?>/<?php echo e($key); ?>" alt="file">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

    	                 <?php $__currentLoopData = $item->getMedia('pass')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	                	<div class="" style="width: 49%;">
		                        <a target="_blank" class="input-name" style="display: block; " href="/storage/app/public/<?php echo e($pass->id); ?>/<?php echo e($pass->file_name); ?>">
		                            <img src="/storage/app/public/<?php echo e($pass->id); ?>/<?php echo e($pass->file_name); ?>" alt="">
		                        </a>
    		                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    	                <?php $__currentLoopData = $item->getMedia('pass')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	                	<div class="new-flex hide">
                                <?php if(strpos($pass->getUrl(),$pass->file_name)): ?>
                                    <a target="_blank" class="input-name" href="<?php echo e($pass->getUrl()); ?>"><img src="<?php echo e($pass->getUrl()); ?>" alt=""></a>
                                <?php else: ?>
    		                        <a target="_blank" class="input-name" href="/storage/app/public/<?php echo e($pass->id); ?>/<?php echo e($pass->file_name); ?>">Паспорт <?php echo e($key+1); ?></a>
                                <?php endif; ?>
    		                </div>
    	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    	                <?php if($item->getMedia('contract')->first()): ?>
    		                <!---<div class="new-flex">
    			                <a target="_blank" class="input-name" href="<?php echo e($item->getMedia('contract')->first()->getUrl()); ?>">Договор</a>
    			            </div>--->
    		            <?php endif; ?>
    	            </div>
    	        </div>
    		    <div class="buttons-group hide">
    	            <button type="button" class="error hide" id="error">Отправить уведомление об ошибке</button>
    	            <button type="submit">
    	                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.67902 0.46875H11.4909L13.9249 2.97016V12.7147C13.9249 13.4661 13.3157 14.0753 12.5643 14.0753H1.67902C0.927546 14.0753 0.318359 13.4661 0.318359 12.7147V1.82941C0.318359 1.07794 0.927546 0.46875 1.67902 0.46875ZM10.5233 1.83011V5.91208H3.72002V1.83011H1.67904V12.7154H3.03969V7.27274H11.2036V12.7154H12.5643V3.52362L10.9164 1.83011H10.5233ZM5.07843 4.55142V1.83011H9.1604V4.55142H5.07843ZM4.40039 8.63349V12.7155H9.84302V8.63349H4.40039ZM8.4824 2.51045H7.12174V3.8711H8.4824V2.51045Z" fill="white"/></svg>
    	                Сохранить
    	            </button>
    	        </div>

    	</div>


	</div>

</form>

	<form method="POST" id="error_form" action="<?php echo e(route('recipients.error', $item->id?$item->id:0)); ?>" style="display: none">
        <?php echo csrf_field(); ?>
        <div class="form-head">Сообщение об ошибке</div>
        <div class="modal-inputs">
            <div class="modal-flex">
            	<?php echo e(Form::select('registration', __('ui.rejected'))); ?>

            	
            </div>
            <div class="modbutton">
                <button type="submit" class="modal-submit">Отправить</button>
            </div>
        </div>
    </form>

	<script>
		$(function(){
			$('#error').click(function(){
				$('#error_form').toggle();
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/admin/recipients/form.blade.php ENDPATH**/ ?>