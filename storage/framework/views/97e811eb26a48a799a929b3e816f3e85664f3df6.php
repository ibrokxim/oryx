<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.profileNav','data' => []]); ?>
<?php $component->withName('profileNav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="container">


        <div class="content-top flex flex-wrap between align-center mb-50px">

            <div class="">
                <div class="title adress-count">
                    Мои уведомления
                </div>
                <p class="sub-adress">Уведомления о действиях на сайте</p>
            </div>

            <a href="<?php echo e(route('profile.notifications')); ?>" class=" go-back">
                <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0.853516 7.43834L8.66725 14.2754V10.3145C11.1259 10.0524 13.1586 10.7517 14.8276 12.4207L16.0958 13.6888V11.8954C16.0958 7.24108 13.5319 4.71313 8.66725 4.48404V0.601318L0.853516 7.43834ZM3.11088 7.43878L7.18274 3.8759V5.95308H7.9256C11.7889 5.95308 13.9059 7.32812 14.4617 10.1996C12.5725 8.93526 10.34 8.51184 7.80347 8.93459L7.18274 9.03805V11.0017L3.11088 7.43878Z"
                          fill="#222222"/>
                </svg>
                Назад
            </a>

        </div>

        <div class="notif whitebox">
            <div class="notif-block">
                <div class="notif-flex">
                    <div class="notif-type">
                        <?php echo e($item->title); ?>

                    </div>
                    <div class="notif-date"><?php echo e($item->created_at->format('d.m.Y, H:m')); ?></div>
                </div>
                <div class="notif-body">
                    <p><?php echo $item->text; ?></p>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Настройки аккаунта',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    route('profile.notifications')=>'Мои уведомления'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/profile/notification.blade.php ENDPATH**/ ?>