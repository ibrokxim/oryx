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

        <div class="mb-70px">
            <div class="title adress-count">
                Список ваших посылок
            </div>
            <p class="sub-adress">Вся информация о ваших посылках и их статусах</p>
        </div>


        <?php if(Session::has('order_nf_np')): ?>
            <div class="alert alert-info mt-5">Не найдено неоплаченных посылок</div>
        <?php endif; ?>
        <?php if(Session::has('order_nf')): ?>
            <div class="alert alert-info mt-5">Посылка не найдена</div>
        <?php endif; ?>
        <?php if(Session::has('order_payed')): ?>
            <div class="alert alert-info mt-5">Посылка уже оплачена</div>
        <?php endif; ?>
        <?php if(Session::has('order_error')): ?>
            <div class="alert alert-info mt-5">Ошибка при формировании платежа</div>
        <?php endif; ?>
        <?php if(Session::has('order_return_error')): ?>
            <div class="alert alert-info mt-5">Ошибка при проверке платежа</div>
        <?php endif; ?>

        <div class="parcels-content">

            <div class="transact-nav row mb-50px">
                <?php $__currentLoopData = __('ui.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_id=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-sm-6">
                        <a style="margin-bottom: 10px;" class="transact-link <?php echo e($status_id==request()->input('status')?'active':''); ?>" href="<?php echo e(route('profile.parcels')); ?>?status=<?php echo e($status_id); ?>">
                            <div><?php echo e($status); ?></div>
                            <span>(<?php echo e(Auth::user()->parcelStatusCount($status_id)); ?>)</span>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <?php if(count($items)): ?>


                <div class="content-added" style="width: 100%;">
                    <?php if(Session::has('not_found')): ?>
                        <div class="alert alert-info">Посылка не найдена</div>
                    <?php endif; ?>
                    <?php if(Session::has('balance')): ?>
                        <div class="alert alert-info">Недостаточно средств</div>
                    <?php endif; ?>
                    <?php if(Session::has('already_paid')): ?>
                        <div class="alert alert-info">Посылка уже оплачена</div>
                    <?php endif; ?>
                    <div class="table-parcels">
                        <table class="partable table transact">
                            <thead>
                            <tr>
                                <?php if(request('status')==3 || request('status')==2): ?>
                                    <td></td>
                                <?php endif; ?>
                                <td>Трек-код</td>
                                <?php if(request('status')>=4): ?>
                                    <td>Трек-внутр.</td>
                                <?php endif; ?>
                                <td style="min-width: 100px">Статус</td>
                                
                                <td>Получатель</td>
                                <?php if(request('status')!=4): ?>
                                    <td>Страна доставки</td>
                                <?php endif; ?>
                                <?php if(request('status')!=0): ?>
                                    <td>Вес(кг)/Габариты(см)</td>
                                <?php endif; ?>



                                <?php if(request('status')==0): ?>
                                    <td></td>
                                <?php endif; ?>


                                <td>Страна отправки</td>
                                <?php if(request('status')==2): ?>
                                    <td>Дата отправки</td>
                                <?php endif; ?>
                                <?php if(request('status')==4): ?>
                                    <td>Стоимость</td>
                                <?php endif; ?>
                                <?php if(request('status')==6): ?>
                                    <td>Стоимость</td>
                                <?php endif; ?>
                                <?php if(request('status')==5): ?>
                                    <td>Стоимость</td>
                                <?php endif; ?>

                                <?php if(request('status')!=0): ?>
                                    <td>Cтатус</td>
                                <?php endif; ?>



                                <?php if(request('status')==0): ?>
                                    <td></td>
                                <?php endif; ?>
                                <?php if(request('status')==0): ?>
                                    <td>Статус</td>
                                <?php endif; ?>


                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if(request('status')==3 || request('status')==2): ?>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="ids" class="circle-check" value="<?php echo e($item->id); ?>">
                                                <span></span>
                                            </label>
                                        </td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="#more_<?php echo e($item->id); ?>" class="more"><?php echo e($item->track); ?></a>
                                    </td>
                                    <?php if($item->status>=4): ?>
                                        <td><?php echo e($item->in_track); ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <div class="parcel_point">
                                            <img src="/images/point.svg">
                                            <span><span style="width: <?php echo e(request('status')==10?100:request('status')*20); ?>%"></span></span>
                                        </div>
                                    </td>
                                    

                                    <td>
                                        <?php if($item->status>=4): ?>
                                            <?php echo e($item->in_fio); ?>

                                        <?php else: ?>
                                            <?php echo e($item->recipient->surname ?? ''); ?> <?php echo e($item->recipient->name ?? ''); ?>

                                        <?php endif; ?>
                                    </td>
                                    <?php if(request('status')!=4): ?>
                                        <td><?php echo e($item->country); ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <?php echo e($item->weight); ?>

                                    </td>
                                    <td>
                                        <?php echo e($item->from); ?>

                                    </td>

                                    <?php if($item->status==2): ?>
                                        <td><?php echo e($item->date_out?$item->date_out->format('d.m.Y'):''); ?></td>
                                    <?php endif; ?>

                                    <?php if($item->status!=2): ?>
                                        <td></td>
                                    <?php endif; ?>

                                    <td>
                                        <?php if($item->status==2): ?>
                                            <?php if($item->payed): ?>
                                                Оплачен
                                            <?php else: ?>
                                                <a href="<?php echo e(route('profile.parcels.pay',$item->id)); ?>">Оплатить</a>
                                            <?php endif; ?>
                                        <?php elseif($item->status==3 && $item->country_out==6): ?>
                                            <a href="<?php echo e(route('profile.parcels.delivery',$item->id)); ?>" class="in_delivery">На доставку</a>
                                        <?php elseif(!$item->status): ?>
                                            <div class="parcel-edit">
                                                <form method="post" action="<?php echo e(route('profile.parcels.delete',$item->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="icon-delete">
                                                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0.945609 13.5272C0.945609 14.4342 1.68767 15.1762 2.59464 15.1762H9.19077C10.0977 15.1762 10.8398 14.4342 10.8398 13.5272V3.63302H0.945609V13.5272ZM11.6643 1.15948H8.77851L7.95399 0.334961H3.83141L3.0069 1.15948H0.121094V2.80851H11.6643V1.15948Z" fill="#BCBDBE"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr id="more_<?php echo e($item->id); ?>" style="display: none">
                                    <td colspan="7">
                                        <div style="display: flex">
                                            <?php if(count($item->goods)): ?>
                                                <div style="margin-right: 50px;">
                                                    <p>Товары:</p>
                                                    <?php $__currentLoopData = $item->goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p><?php echo e($good->name); ?> <?php echo e($good->price); ?><?php echo e($good->currency); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(request('status')>=4): ?>
                                                <div style="margin-right: 50px;">
                                                    <p>Получатель: <?php echo e($item->recipient->surname ?? ''); ?> <?php echo e($item->recipient->name ?? ''); ?></p>                               <p>Номер посылки:<?php echo e($item->in_track); ?></p>
                                                    <p>Вес: <?php echo e($item->weight); ?> </p>
                                                    <p>Стоимость доставки:<?php echo e($item->prod_price); ?>$ </p>
                                                    <p>Город: </p>
                                                    <p>Адрес: <?php echo e($item->in_address); ?></p>
                                                    <p>Телефон: <?php echo e($item->in_phone); ?></p>
                                                    <p>Комментарий: <?php echo e($item->in_comment); ?></p>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(request('status')>=2): ?>
                                                <div>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <?php if($item->status==4): ?>
                                        <td><?php echo e($item->prod_price); ?>$</td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(request('status')==3): ?>
                        <a href="<?php echo e(route('profile.parcels.deliveryMany')); ?>" class="btn modal-submit" style="width: auto; display: none;margin-top: 10px;line-height: 26px;" id="checked_d">Выделенные на доставку</a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('profile.parcels.payMany')); ?>" class="btn modal-submit" style="width: auto; display: none;margin-top: 10px;line-height: 26px;" id="checked_p">Выделенные на оплату</a>
                </div>

                <div class="text-right">
                    <a href="<?php echo e(route('profile.parcels.create')); ?>" class="bt btn-orange add-parcel">Добавить посылку</a>
                </div>


            <?php else: ?>
                <div class="content-block">
                    <div class="empty">
                        <img src="/storage/images/box-default.png" class="empty-img">
                        <div class="empty-head">У вас еще нет посылок</div>
                        <a href="<?php echo e(route('profile.parcels.create')); ?>" class="bt btn-orange empty-btn add-parcel">Добавить посылку</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>


    </div>

    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-account">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-head">Добавить получателя</div>
                        <div class="modal-inputs">
                            <div class="modal-noflex">
                                <input type="text" name="in_fio" value="" placeholder="Фио получателя" required />
                            </div>
                            <div class="modal-noflex">
                                <?php echo e(Form::select('in_city', ['Алматы'=>'Алматы','Нур-Султан'=>'Нур-Султан','др. город'=>'др. город'], '',['class'=>'counrty-select c6', 'id'=>'city-select', 'style'=>'width: 100%;margin: 10px 0;','required'=>'required'])); ?>

                                
                            </div>
                            <div class="modal-noflex" style="display: none">
                                <input type="text" id="city" name="" value="" placeholder="Город" style="margin-bottom: 10px;" />
                            </div>
                            <div class="modal-noflex">
                                <input type="text" name="in_address" value="" placeholder="Адрес полный" required />
                            </div>
                            <div class="modal-noflex">
                                <input type="text" name="in_phone" value="" placeholder="Телефон" required style="margin: 10px 0;" />
                            </div>
                            <div class="modal-noflex">
                                <textarea name="in_comment" cols="30" rows="10" placeholder="Комментарий" style="width: 100%;border: 1px solid #cccccc;background: #f0f0f0;font-size: 14px;font-weight: 500;height: 80px;padding-left: 10px;border-radius: 4px;"></textarea>
                            </div>
                            <div class="modbutton">
                                <button type="button" class="modal-cancel" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="modal-submit">На доставку</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function(){
            $('.in_delivery').click(function(e){
                e.preventDefault();
                $('#modal').modal();
                $('#modal form').attr("action", $(this).attr("href"));
            });

            $('#checked_d').click(function(e){
                e.preventDefault();
                var str = '';
                $('.circle-check:checked').each(function(i,o){
                    str += 'ids[]='+$(o).val()+'&';
                });
                $('#modal').modal();
                $('#modal form').attr("action", $(this).attr("href") + '?' + str);
            });

            $('#city-select').change(function(){
                if ($(this).val().indexOf('.')>=0) {
                    $('#city-select').removeAttr('name').prop('required',false);
                    $('#city').attr('name','in_city').prop('required',true).parent().show();
                }else{
                    $('#city').removeAttr('name').prop('required',false).parent().hide();
                    $('#city-select').attr('name','in_city').prop('required',true);
                }
            });

            $('.more').click(function(e){
                e.preventDefault();
                $($(this).attr('href')).toggle();
            });

            $('#checked_p').click(function(e){
                e.preventDefault();
                var str = '';
                $('.circle-check:checked').each(function(i,o){
                    str += 'ids[]='+$(o).val()+'&';
                });
                if(str) window.location = $(this).attr("href") + '?' + str;
            });
        });
    </script>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app',[
    'title'=>'Мои посылки',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    url()->current()=>'Мои посылки'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/profile/parcels.blade.php ENDPATH**/ ?>