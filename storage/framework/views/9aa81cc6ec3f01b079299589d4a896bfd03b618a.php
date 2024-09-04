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
                Транзакции
            </div>
            <p class="sub-adress">Список проведенных транзакций</p>
        </div>

        <div class="transact-nav mb-50px">
            <a href="<?php echo e(route('profile.transactions')); ?>" class="transact-link <?php echo e(request('outgo',-1)<0?'active':''); ?>">Все</a>
            <a href="<?php echo e(route('profile.transactions', ['outgo'=>0])); ?>"
               class="transact-link <?php echo e(request('outgo',-1)==0?'active':''); ?>">Приход</a>
            <a href="<?php echo e(route('profile.transactions', ['outgo'=>1])); ?>"
               class="transact-link <?php echo e(request('outgo',-1)==1?'active':''); ?>">Расход</a>
        </div>

        <div class="transact-flex">
            <div class="transact-left balance-flex flex flex-wrap between align-center mb-50px hide">
                <div class="title20">Баланс: <?php echo e(Auth::user()->balance); ?>$</div>

                <a href="<?php echo e(route('profile.balance')); ?>" class="replenish bt btn-orange">пополнить счет</a>
            </div>
            <div class="table-block">
                <table class="table transact">
                    <thead>
                    <tr>
                        <td>Сумма ($)</td>
                        <td>Тип</td>
                        <td>Дата</td>
                        <td>Комментарии</td>
                        <td>Подтвержден</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->count); ?></td>
                            <td><?php echo e($item->outgo?'Расход':'Приход'); ?></td>
                            <td><?php echo e($item->created_at->format('d.m.Y')); ?></td>
                            <td></td>
                            <td><?php echo e($item->created_at->format('d.m.Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Мои посылки',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    url()->current()=>'Мои посылки'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/profile/transactions.blade.php ENDPATH**/ ?>