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
        <?php if(Session::has('order_error')): ?>
            <div class="alert alert-info">Ошибка при формировании платежа</div>
        <?php endif; ?>
        <?php if(Session::has('order_return_error')): ?>
            <div class="alert alert-info">Ошибка при проверке платежа</div>
        <?php endif; ?>
        <div class="schet">
            <p class="schet-head"><b>Ваш текущий баланс <?php echo e(Auth::user()->balance); ?>$</b></p>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('profile.balance')); ?>">
                <?php echo csrf_field(); ?>
                <div class="schet-in">
                    <input type="text" id="usd_count" name="count" value="10" placeholder="Введите сумму"
                           class="style-input schet-input" autocomplete="off"/>
                    <a href="<?php echo e(route('profile.balance')); ?>" class="replenish bt btn-orange">пополнить счет</a>
                </div>
                <p class="tenge">₸ <span id="tenge_count"><?php echo e(number_format($currency*11,'2',',',' ')); ?></span></p>
            </form>
            <p><a href="/soglasheni" target="_blank">Соглашение</a></p>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            var currency = <?php echo e($currency); ?>;
            $('#usd_count').keyup(function () {
                $(this).val($(this).val().replace(',', '.'));
                $('#tenge_count').html(new Intl.NumberFormat().format($(this).val() * currency));
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Настройки аккаунта',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    url()->current()=>'Пополнить баланс'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/profile/balance.blade.php ENDPATH**/ ?>