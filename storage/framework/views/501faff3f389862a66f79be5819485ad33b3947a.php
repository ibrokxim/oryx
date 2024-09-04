<?php
  $title = $item->id?'Редактировать сотрудника':'Создать сотрудника';
?>

<?php $__env->startSection('content'); ?>

    <div class="content-wrap">

        <form method="POST" enctype="multipart/form-data" action="<?php echo e($item->id?route('admins.update', $item->id):route('admins.store', $item->id)); ?>">
    		<?php echo csrf_field(); ?>
            <?php if($item->id): ?>
              <?php echo method_field('PUT'); ?>
            <?php endif; ?>
    	    <div class="content-top">

    	        <div class="buttons-top" style="justify-content: flex-end;width: 100%;">
        	        <button type="submit" class="save"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.26764 0.490234H13.0988L15.7858 3.25151V14.0084C15.7858 14.8379 15.1133 15.5104 14.2838 15.5104H2.26764C1.4381 15.5104 0.765625 14.8379 0.765625 14.0084V1.99225C0.765625 1.16271 1.4381 0.490234 2.26764 0.490234ZM12.0301 1.99243V6.49848H4.51998V1.99243H2.26696V14.0085H3.76897V8.00049H12.7811V14.0085H14.2831V3.86188L12.464 1.99243H12.0301ZM6.02202 4.99646V1.99243H10.5281V4.99646H6.02202ZM5.27135 9.50256V14.0086H11.2794V9.50256H5.27135ZM9.77776 2.7431H8.27575V4.24511H9.77776V2.7431Z" fill="white"/></svg>
        	        Сохранить
        	        </button>
        	        <a class="go-back" href="<?php echo e(route('admins.index')); ?>"> <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.734375 7.99988L9.49987 15.6697V11.2264C12.258 10.9323 14.5383 11.7168 16.4106 13.5891L17.8332 15.0117V12.9999C17.8332 7.7786 14.9571 4.94273 9.49987 4.68574V0.330078L0.734375 7.99988ZM3.26537 7.9999L7.83322 4.00304V6.33323H8.66655C13.0004 6.33323 15.3753 7.87575 15.9988 11.097C13.8795 9.67865 11.375 9.20365 8.52955 9.6779L7.83322 9.79396V11.9968L3.26537 7.9999Z" fill="white"/></svg>Назад</a>
        	    </div>

    	    </div>
    	    <div class="content">
    	        <div class="profiles">
    	            <div class="prof-head"><?php echo e($title); ?></div>
    	            <div class="prof-inputs flex flex-wrap">
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Имя</p>
    	                    <input type="text" name="name" autocomplete="on" value="<?php echo e(old('name', $item->name)); ?>" placeholder="введите имя"/>
    	                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    				            <span class="invalid-feedback" role="alert">
    				              <strong><?php echo e($message); ?></strong>
    				            </span>
    				        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Email</p>
    	                    <input type="text" name="email" autocomplete="on" value="<?php echo e(old('email', $item->email)); ?>" placeholder="введите email"/>
    	                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    				            <span class="invalid-feedback" role="alert">
    				              <strong><?php echo e($message); ?></strong>
    				            </span>
    				        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    	                </div>
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Пароль</p>
    	                    <input type="password" name="password" autocomplete="on" placeholder="введите пароль" <?php if(!$item->id): ?> required <?php endif; ?>/>
    	                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    				            <span class="invalid-feedback" role="alert">
    				              <strong><?php echo e($message); ?></strong>
    				            </span>
    				        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Фото</p>
    	                    <input type="file" name="avatar" />
    	                </div>
    	                <div class="new-flex w-two">
    	                    <p class="input-name">Роль</p>
    	                    <select name="role">
    				            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				              <option
    				              <?php if($item->id): ?>
    				                <?php echo e($item->roles->contains($id)? 'selected' : ''); ?>

    				              <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($role); ?></option>
    				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    				        </select>
    	                </div>
    	                <div class="new-flex w-one">
    	                    <p class="input-name">Город</p>
    	                    <?php echo e(Form::select('city', $cities, $item->city)); ?>

    	                </div>
    	            </div>
    	        </div>
    	    </div>
    	</form>


    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/admin/admins/form.blade.php ENDPATH**/ ?>