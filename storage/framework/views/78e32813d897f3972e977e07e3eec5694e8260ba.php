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

    <?php if(\Session::has('instead')): ?>
        <div class="container">
            <div class="alert alert-success">
                <p>Запрос отправлен</p>
            </div>
        </div>
    <?php endif; ?>
	<div class="container">

	    <div class="account-blocks flex flex-wrap">
            <div class="acc-card whitebox mb-30px flex flex-wrap" style="width: 100%;">
                <div class="avatar">
                    <img src="/images/avatar.jpg">
                </div>
                <div class="acc-data">
                    <div class="acc-name title20">
                        <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?>

                    </div>
                    <div class="userid flex flex-wrap">
                        <p class="first-id">ID:</p>
                        <p class="item-id">#<?php echo e(Auth::user()->id); ?></p>
                    </div>
                    <div class="usermail flex flex-wrap">
                        <p class="first-id">Email:</p>
                        <p class="item-id"><?php echo e(Auth::user()->email); ?></p>
                    </div>
                    <div class="userphone flex flex-wrap">
                        <p class="first-id">Телефон:</p>
                        <p class="item-id"><?php echo e(Auth::user()->p); ?></p>
                    </div>
                    <div class="view-all">
                        <a href="<?php echo e(route('profile.settings')); ?>">Посмотреть все данные</a>
                    </div>

                <?php if((Auth::user()->tariffObj->code ?? '')!='default'): ?>
                	<div class="vip-status">VIP</div>
                <?php endif; ?>
                </div>
            </div>
            <div class="my-parcels  whitebox mb-30px" style="width: 100%;">
                <div class="acc-name title20">Мои посылки</div>
                <p class="sub-text">Просмотр статуса и добавление новых посылок</p>
                <p class="parcels-active">Активных посылок (<?php echo e(Auth::user()->parcelActiveCount()); ?>)</p>
                <div class="view-all">
                    <a href="<?php echo e(route('profile.parcels')); ?>">Узнать подробнее</a>
                </div>
            </div>
            <div class="transaction  whitebox mb-30px" style="width: 100%;">
                <div class="acc-name title20">Транзакции</div>
                <p class="sub-text">История совершенных транзакций</p>
                <div class="view-all">
                    <a href="<?php echo e(route('profile.transactions')); ?>">Узнать подробнее</a>
                </div>
            </div>
        </div>

	</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app',[
    'title'=>'Личный кабинет',
    'breadcrumbs'=>[
        url()->current()=>'Личный кабинет'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/profile/index.blade.php ENDPATH**/ ?>