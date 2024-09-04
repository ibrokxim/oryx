<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="schet">
            <p class="schet-head">При оплате позвникла ошибка, либо платеж был отменен.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Настройки аккаунта',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    url()->current()=>'Оплата'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/profile/error.blade.php ENDPATH**/ ?>