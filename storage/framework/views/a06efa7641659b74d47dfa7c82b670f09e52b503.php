<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="schet">
            <?php if($res['OrderStatus']==2): ?>
                Платеж прошел успешно - посылка оплачена.
            <?php else: ?>
                Платеж ещё проверяется.
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Настройки аккаунта',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    url()->current()=>'Оплата'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/profile/success.blade.php ENDPATH**/ ?>