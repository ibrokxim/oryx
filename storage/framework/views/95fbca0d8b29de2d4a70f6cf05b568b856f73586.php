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

        <div class="mb-50px">
            <div class="title adress-count">
                Уведомления
            </div>
            <p class="sub-adress">Уведомления о действиях на сайте</p>
        </div>

        <form method="POST" action="<?php echo e(route('profile.nsettings')); ?>">
            <?php echo csrf_field(); ?>
            <div class="notific notification flex flex-wrap ">
                <div class="left-not whitebox mb-30px" style="max-width: 400px">
                    <div class="not-head mb-30px">
                        <b>Уведомления о статусе посылки</b>
                    </div>
                    <div class="not-checkbox">
                        <div class="not-group">
                            <input type="hidden" name="notifications[regp]" value="0">
                            <input type="checkbox" name="notifications[regp]" value="1" id="ch-1"
                                   class="checking" <?php echo e(Auth::user()->setting('regp')?'checked':''); ?> />
                            <label for="ch-1" class="not-label">Уведомление «Регистрация посылки»</label>
                        </div>
                        <div class="not-group">
                            <input type="hidden" name="notifications[usa]" value="0">
                            <input type="checkbox" name="notifications[usa]" value="1" id="ch-2"
                                   class="checking" <?php echo e(Auth::user()->setting('usa')?'checked':''); ?> />
                            <label for="ch-2" class="not-label">Уведомление «Получено на складе в США»</label>
                        </div>
                        <div class="not-group">
                            <input type="hidden" name="notifications[delivered]" value="0">
                            <input type="checkbox" name="notifications[delivered]" value="1" id="ch-3"
                                   class="checking" <?php echo e(Auth::user()->setting('delivered')?'checked':''); ?> />
                            <label for="ch-3" class="not-label">Уведомление «Доставлено»</label>
                        </div>
                    </div>
                </div>
                <div class="right-not whitebox mb-30px" style="max-width: 400px">
                    <div class="not-head mb-30px">
                        <b>Уведомления o транзакциях</b>
                    </div>
                    <div class="not-checkbox">
                        <div class="not-group">
                            <input type="hidden" name="notifications[balance]" value="0">
                            <input type="checkbox" name="notifications[balance]" value="1" id="ch-4"
                                   class="checking" <?php echo e(Auth::user()->setting('balance')?'checked':''); ?> />
                            <label for="ch-4" class="not-label">Уведомление о пополнении баланса</label>
                        </div>
                        <div class="not-group">
                            <input type="hidden" name="notifications[bonus]" value="0">
                            <input type="checkbox" name="notifications[bonus]" value="1" id="ch-5"
                                   class="checking" <?php echo e(Auth::user()->setting('bonus')?'checked':''); ?> />
                            <label for="ch-5" class="not-label">Уведомление о бонусах</label>
                        </div>
                    </div>
                </div>
                <div class="all-disable whitebox mb-30px" style="max-width: 400px">
                    <div class="not-group">
                        <input type="hidden" name="notifications[disable]" value="0">
                        <input type="checkbox" name="notifications[disable]" value="1" id="ch-6"
                               class="checking" <?php echo e(Auth::user()->setting('disable')?'checked':''); ?> />
                        <label for="ch-6" class="not-label">Отключить все уведомления на эл. почту и на аккаунт</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="button-save bt btn-orange">Сохранить</button>
        </form>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Настройка уведомлений',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    url()->current()=>'Настройка уведомлений'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/profile/nsettings.blade.php ENDPATH**/ ?>