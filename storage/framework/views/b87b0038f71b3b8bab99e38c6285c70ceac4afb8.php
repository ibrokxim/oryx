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

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>


    <div class="container">
        <div class="count-flex flex flex-wrap between">

            <div class="title" style="width: 100%;">
                Добавление посылки
            </div>

            <div class="title-text mb-70px" style="width: 100%;">
                После оформления данных о посылке нажмите «Добавить посылку». Также не забудьте добавить получателя.
            </div>

            <div class="main-block-adress">
                <form method="POST" action="<?php echo e(route('profile.parcels.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="create-flex_wrap flex flex-wrap between">

                        <p>Страна отправки</p>

                        <?php
                            $addresses = \App\Models\Address::get();
                            $addresses_id = $addresses->pluck('tab');
                        ?>

                        <div class="tabtab">

                            <?php
                                $addresses = \App\Models\Address::get();
                                $tabs = \App\Models\Setting::whereIn('id', $addresses->pluck('tab'))->get();
                                $active = $tabs->first();
                            ?>

                            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button class="tablinks <?php echo e(!$loop->first ?: 'active'); ?>" onclick="openCity(event, '<?php echo e($tab->name); ?>')"><?php echo e($tab->name); ?></button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="<?php echo e($tab->name); ?>" class="tabcontent">
                                <div class="faq">
                                    <div class="create-flex">
                                        <p class="input-item">Город отправки</p>
                                        <?php echo e(Form::select('city_out', $addresses->where('tab', $tab->id)->pluck('title','id'),  old('country_out'),['class'=>'counrty-select mycity','id'=>'country_out_'.$tab->name])); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div id="eu" style="display: none">
                            <div class="create-flex">
                                <p class="input-item">Фио получателя</p>
                                <input type="text" name="in_fio" value="<?php echo e(old('in_fio')); ?>"
                                       placeholder="Фио получателя"
                                       class="style-input num-tracking <?php $__errorArgs = ['in_fio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            </div>
                            <div class="create-flex">
                                <p class="input-item">Город</p>
                                <input type="text" name="in_city" value="<?php echo e(old('in_city')); ?>" placeholder="Город"
                                       class="style-input num-tracking <?php $__errorArgs = ['in_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            </div>
                            <div class="create-flex">
                                <p class="input-item">Адрес полный</p>
                                <input type="text" name="in_address" value="<?php echo e(old('in_address')); ?>"
                                       placeholder="Адрес полный"
                                       class="style-input num-tracking <?php $__errorArgs = ['in_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            </div>
                            <div class="create-flex">
                                <p class="input-item">Телефон</p>
                                <input type="text" name="in_phone" value="<?php echo e(old('in_phone')); ?>" placeholder="Телефон"
                                       class="style-input num-tracking <?php $__errorArgs = ['in_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
                            </div>
                        </div>

                        <div class="create-flex" style="max-width: 45%">
                            <p class="input-item">Страна доставки</p>
                            <?php echo e(Form::select('country', $countries_out, old('country'),['class'=>'counrty-select'])); ?>

                        </div>
                        <div class="create-flex" style="max-width: 280px">
                            <p class="input-item c6">Город доставки</p>
                            <?php echo e(Form::select('city', $cities, old('city'),['class'=>'counrty-select c6'])); ?>

                        </div>
                        <div class="create-flex" style="max-width: 345px">
                            <p class="input-item">Номер трекинга</p>
                            <input type="text" name="track" value="<?php echo e(old('track')); ?>" placeholder="Номер трекинга"
                                   class="style-input num-tracking <?php $__errorArgs = ['track'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required/>
                            <?php $__errorArgs = ['track'];
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
                        <div class="create-flex" style="max-width: 280px">
                            <p class="tracking-info">Трекинг-номер – это не номер заказа, а номер, по которому
                                отслеживается доставка посылки в курьерской службе.</p>

                        </div>

                        <div class="create-flex" id="goods" style="width: 100%;">
                            <div class="good good-flex flex flex-wrap between" style="align-items: flex-end;">

                                <div style="max-width: 345px; width: 100%">
                                    <p class="input-item">Декларация</p>
                                    <input type="text" name="goods[name][]" value="" placeholder="Наименование"
                                           class="style-input declarat" required/>
                                    
                                </div>

                                <div style="max-width: 65px">
                                    <p class="input-item"></p>
                                    <select name="goods[currency][]" class="curr-select good_currency">
                                        <option selected value="$">$</option>
                                        <option value="€">€</option>
                                    </select>

                                </div>

                                <div style="max-width: 200px;">
                                    <p class="input-item">Стоимость</p>
                                    <input name="goods[price][]" type="text" value="" placeholder="Введите сумму"
                                           class="style-input col-vo-input good_price" required/>
                                </div>
                                <div class="create-flex" style="max-width: 345px">


                                </div>


                                <div class="itog" style="width: 100%;">
                                    <div style="max-width: 65px">

                                        <input type="checkbox" onclick="window.myDialog.showModal();"/>
                                        <dialog id="myDialog">“ВНИМАНИЕ
                                            Услуга переупаковки/убрать дополнительную коробку от производителя является
                                            ПЛАТНОЙ.

                                            Стоимость составляет 2$ за 1 трек номер.

                                            Товары электроники, техники, косметики переупаковке НЕ подлежат”
                                            <input id="check" type="checkbox" onclick="window.myDialog.close();"/>
                                            <center>Потвердить</center>
                                        </dialog>


                                        <div class="create-flex" style="max-width: 280px">Переупокавать/Убрать
                                            дополнительную упаковку <p class="tracking-info"></p>
                                            <p class="input-item"></p>
                                            <div class="create-flex" style="max-width: 280px">

                                                <fieldset>
                                                    <legend></legend>
                                                    <div>
                                                        <input type="hidden" id="puF4" type="goods[price][]" name="prod_price" value="0"/>
                                                    </div>
                                                    <script>

                                                        var txt = document.getElementById('puF4'),
                                                            check = document.getElementById('check');

                                                        check.onchange = function () {
                                                            txt.value = (this.checked) ? 2 : 0;
                                                        };

                                                    </script>

                                                </fieldset>

                                            </div>
                                            </select>
                                            <p class="value"><b>Итого:</b> <span class="title24">0.0$</span></p>

                                            <a href="#" class="remove" style="display: none;">Удалить</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <p class="value"><b></b> <span class="goods[price][]"></span></p>

                        <div class="attention" style="max-width: 650px;">

                            <p>Во избежание проблем при таможенной очистке, просим вводить детальное описание
                                наименования товара на русском.</p>
                            <p>С 1 января 2020 года были сняты ограничение по ввозу товаров для личного пользования в
                                адрес одного физлица.</p>
                            <p>При каждом отправлении можно будет ввозить без уплаты таможенных пошлин товары, стоимость
                                которых не превышает 200 евро и/или вес которых не превышает 31 кг.</p>
                            <p>При превышении установленных норм необходимо будет уплатить таможенный платеж по ставке
                                15% от стоимости или 2 евро за 1 каждый лишний килограмм.</p>

                        </div>


                        <div class="add-prod">
                            <button type="button" class="add bt btn-orange" id="add">Добавить еще один товар</button>
                        </div>
                        <div class="poluchatel mb-30px">
                            <?php if(count($recipients)): ?>
                                <p class="input-item mr-3">Получатель</p>
                                <?php echo e(Form::select('recipient_id', $recipients, false, ['class'=>'curr-select','required','oninvalid'=>"this.setCustomValidity('Выберите получателя из списка или добавьте нового получателя')"])); ?>

                            <?php else: ?>
                                <p>Чтобы забрать посылки в Казахстане, добавьте <a href="<?php echo e(route('profile.settings')); ?>">получателя</a></p>
                            <?php endif; ?>
                        </div>


                        <div class="under-buttons">
                            <?php if(count($recipients) > 0): ?>
                                <button type="submit" class="add-succ bt btn-orange">Добавить посылку</button>
                                <a href="<?php echo e(route('profile.parcels')); ?>" class="bt btn-cancel">Отменить</a>
                            <?php endif; ?>
                        </div>


                </div></form>

            </div>


            <div class="right-adresses">
                <div class="vazhno">
                    <div class="vazhno-head">ВНИМАНИЕ</div>
                    <p>При заказе на сайтах, слитно с фамилией укажите ваш город AST или ALA. Например:</p>
                    <p>OspanovALA (ALA &ndash; если вам нужна доставка в Алматы или AST - если вам нужна доставка в
                        Нур-Султан и во все остальные города).</p>
                    <p>*ВНИМАНИЕ!* заказы без маркировки города будут отправляться в г. Нур-Султан по умолчанию!</p>
                </div>
            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            /*countryOut();
            $('#country_out').change(function () {
                countryOut();
            });*/

            /*function countryOut() {
                if (parseInt($('#country_out').val()) == 6) {
                    $('#eu').hide();
                    $('.c6').show();
                    $('#eu input').prop('required', false);
                } else {
                    $('#eu').show();
                    $('.c6').hide();
                    $('#eu input').prop('required', true);
                }
            }*/

            $('#add').click(function () {
                var $clone = $('#goods .good').eq(0).clone();
                $clone.find('input').val('');
                $('#goods .value').hide();
                $('#goods .remove').show();

                $clone.find('.value').show();
                $clone.find('.remove').hide();

                $clone.appendTo("#goods");
                calc();
            });

            $('#goods').on('click', '.remove', function (e) {
                e.preventDefault();
                $(this).parents('.good').remove();
                calc();
            });

            var kg_price = <?php echo json_encode(Auth::user()->tariff); ?>;
            $('#goods').on('change', '.good_currency', function () {
                calc();
            });
            $('#goods').on('keyup', '.good_price', function () {
                $(this).val($(this).val().replace(',', '.'));
                calc();
            });

            function calc() {
                var total = 0;
                $('#goods .good').each(function (i, o) {
                    var price = parseFloat($(o).find('.good_price').val());
                    if (!price) price = 0;
                    if ($(o).find('.good_currency').val() != '$')
                        price = Math.ceil(price + (price / 100 * 22));
                    total += price;
                });

                $('.itog span').html(total + '$');
            }
        });

        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks, select;

            select = document.getElementsByClassName("mycity");
            for (i = 0; i < select.length; i++) {
                select[i].setAttribute("disabled", "");
            }

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            document.getElementById('country_out_' + cityName).removeAttribute('disabled');
            evt.currentTarget.className += " active";
        }
        document.getElementById('<?php echo e($active->name); ?>').style.display = "block";
        document.getElementById('country_out_<?php echo e($active->name); ?>').removeAttribute('disabled');
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .tabtab {
            width: 100%;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            height: 52px;
        }

        .tabtab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tabtab button:hover {
            background-color: #ddd;
        }

        .tabtab button.active {
            background-color: #ccc;
        }

        .tabcontent {
            display: none;
            width: 100%;
        }

        .tabcontent .active{
            display: block;
        }

        .tabcontent {
            animation: fadeEffect 1s;
        }

        @keyframes  fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Добавить посылку',
    'breadcrumbs'=>[
    route('profile.index')=>'Личный кабинет',
    route('profile.parcels')=>'Мои посылки',
    url()->current()=>'Добавить посылку'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/profile/add-parcel.blade.php ENDPATH**/ ?>