@php
    $title = 'Данные пользователя';
@endphp
@extends('layouts.admin')
@section('content')
	<div class="content-wrap">
	   <form method="POST" enctype="multipart/form-data" action="{{$item->id?route('parcels.update', $item->id):route('parcels.store', $item->id)}}">
    			@csrf
    	        @if($item->id)
    	          @method('PUT')
    	        @endif

    	    <div class="buttons-top">
                <button type="submit" class="save"><svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.67902 0.46875H11.4909L13.9249 2.97016V12.7147C13.9249 13.4661 13.3157 14.0753 12.5643 14.0753H1.67902C0.927546 14.0753 0.318359 13.4661 0.318359 12.7147V1.82941C0.318359 1.07794 0.927546 0.46875 1.67902 0.46875ZM10.5233 1.83011V5.91208H3.72002V1.83011H1.67904V12.7154H3.03969V7.27274H11.2036V12.7154H12.5643V3.52362L10.9164 1.83011H10.5233ZM5.07843 4.55142V1.83011H9.1604V4.55142H5.07843ZM4.40039 8.63349V12.7155H9.84302V8.63349H4.40039ZM8.4824 2.51045H7.12174V3.8711H8.4824V2.51045Z" fill="white"/></svg>
        	         Сохранить
        	    </button>
                <a class="go-back" href="{{ url()->previous() }}"> <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.734375 7.99988L9.49987 15.6697V11.2264C12.258 10.9323 14.5383 11.7168 16.4106 13.5891L17.8332 15.0117V12.9999C17.8332 7.7786 14.9571 4.94273 9.49987 4.68574V0.330078L0.734375 7.99988ZM3.26537 7.9999L7.83322 4.00304V6.33323H8.66655C13.0004 6.33323 15.3753 7.87575 15.9988 11.097C13.8795 9.67865 11.375 9.20365 8.52955 9.6779L7.83322 9.79396V11.9968L3.26537 7.9999Z" fill="white"/></svg>Назад</a>
            </div>

        	<div class="content content-inner">
        	    <div class="prof-head">Редактировать посылку</div>
        	    <div class="prof-inputs flex flex-wrap">
        	        @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                    @if(!$item->id)
                        <div id="goods" style="width: 100%;">
                            <div class="create-flex good new-flex">
                                <p class="input-item in-name">Декларация</p>
                                <input type="text" name="goods[name][]" value="" placeholder="Наименование" class="style-input declarat head-input" required style="width: auto;" />
                                <select name="goods[currency][]" class="curr-select good_currency head-input" style="width: auto;">
                                    <option selected value="$">$</option>
                                    <option value="€">€</option>
                                </select>
                                <input name="goods[price][]" type="text" value="" placeholder="Стоимость" class="style-input col-vo-input good_price head-input" required style="width: auto;" />
                                <div class="itog">
                                    <div class="value">Итого: <span>0.0$</span></div>
                                    <a href="#" class="remove" style="display: none;">Удалить</a>
                                </div>
                            </div>
                        </div>
                        <div class="new-flex" style="width: 100%;">
                            <p class="in-name"></p>
                            <button type="button" class="add" id="add">+ Добавить товар</button>
                        </div>
        	        @endif

                    <div class="new-flex w-two">
        	            <p class="in-name">Страна отправки</p>
        	            {{ Form::select('country_out', App\Models\Setting::where([['type',3],['active',1]])->pluck('name','id'), $item->country_out,['class'=>'head-input']) }}
        	        </div>
                        <div class="new-flex w-one">
                            <p class="in-name">Получатель</p>
                            <input type="hidden" name="recipient_id" id="recipient_id" value="{{ old('recipient_id', $item->recipient_id) }}" />
                            <input type="hidden" name="user_id" id="user_id" value="{{ old('user_id', $item->user_id) }}" />

                            <select id="recipient_select" class="head-input" >
                                <option value="">Выберите получателя</option>
                                @foreach($users as $id => $userData)
                                    @if(count($userData) >= 4)
                                    <option
                                        value="{{ $id }}"
                                        name="name"
                                        data-name="{{ $userData[0] }}"
                                        data-fname="{{ $userData[1] }}"
                                        data-surname="{{ $userData[2] }}"
                                        data-user-id="{{ $userData['user_id'] }}">
                                        ({{$id}}) {{ $userData[0] }} {{ $userData[1] }} {{ $userData[2] }}</option>
                                    @else
                                        <option value="{{ $id }}" disabled>Некорректные данные</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
        	        <div class="new-flex w-two">
        	            <p class="in-name">Трек</p>
        	            <input type="text" name="track" value="{{ request()->input('t',old('track', $item->track)) }}" class="head-input" />
        	        </div>
        	        @if ($item->status==4)
        	        	<div class="new-flex w-one">
        		            <p class="in-name">Трек по стране</p>
        		            <input type="text" name="in_track" value="{{ old('in_track', $item->in_track) }}" class="head-input" />
        		        </div>
        	        @endif
                    <div class="new-flex w-one">
                        <p class="in-name">Пользователь</p>
                        <input type="text" name="in_track" value="{{ old('in_track', $item->in_track) }}" class="head-input" />
                    </div>

        	        <div class="new-flex w-one">
        	            <p class="in-name">Партия посылки</p>
        	            <input type="text" name="pid" value="{{ old('pid', $item->pid) }}" class="head-input" />
        	        </div>
        	        <div class="new-flex w-two">
        	            <p class="in-name">Вес</p>
        	            <input type="text" name="weight" value="{{ old('weight', $item->weight) }}" class="head-input" />
        	        </div>
        	        <div class="new-flex w-one">
        	            <p class="in-name">Дата вылета</p>
        	            <input type="date" name="date_out" value="{{ old('date_out', $item->date_out?$item->date_out->format('Y-m-d'):date('Y-m-d')) }}" class="head-input" />
        	        </div>

        	        {{-- @if ($item->status==2) --}}
        	        	<div class="new-flex w-two">
        		            <p class="in-name">Стоимость доставки</p>
        		            <input type="tel" name="prod_price" value="{{ old('prod_price', $item->prod_price) }}" class="head-input" />
        		        </div>
        	        {{-- @endif --}}

        	        <div class="new-flex w-one">
        	            <p class="in-name">Статус</p>
        	            {{ Form::select('status', __('ui.status'), $item->status) }}
        	        </div>
                    <div class="new-flex w-two">
                            <p class="in-name">Город отправки</p>
                            <select name="city_out" class="head-input" required>
                                <option value="">Выберите город отправки</option>
                                <option value="1" {{ old('city_out', $item->city_out) == 1 ? 'selected' : '' }}>Нью-Йорк</option>
                                <option value="2" {{ old('city_Яout', $item->city_out) == 2 ? 'selected' : '' }}>Делавер</option>
                            </select>
                    </div>
                    <div class="new-flex w-two">
        	            <p class="in-name">Дополнительные услуги</p>
                        <select name="additional_functions" id="functions">
                            <option value="">Выберите дополнительные услуги</option>
                            @foreach($functions as $id => $name)
                                <option value="{{ $id }}" {{ $item->additionalFunctions->contains($id) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="new-flex w-two" id="additional-fields-container"></div>
                        <div class="new-flex w-two">
                            <p class="in-name">Метод доставки</p>
                            <input type="text" name="delivery_method" value="{{ $deliveryMethod === 'pvz' ? 'Пункт выдачи СДЭК' : ($deliveryMethod === 'address' ? 'До адреса(службой СДЭК)' : ($deliveryMethod === 'pickup' ? 'Самовывоз со склада(Алматы)' : $deliveryMethod)) }}" class="head-input" disabled/>
                        </div>

                        @if($deliveryMethod == 'pvz' || $deliveryMethod == 'address')
                            <div class="new-flex w-two">
                                <p class="in-name">Адрес доставки</p>
                                <input type="text" name="delivery_address" value="{{ $deliveryAddress }}" class="head-input" disabled/>
                            </div>
                        @endif

                    <div class="new-flex">
        	            <p class="in-name">Оплачен</p>
        	            <div class="checkbox">
        	                <div>
        	                    <input type="checkbox" name="payed" id="ch-1" value="1" {{ $item->payed? 'checked': '' }} />
        	                    <p>Да</p>
        	                </div>
        	                <div>
        	                    <input type="checkbox" name="payed" id="ch-2" value="0" {{ $item->payed? '':'checked' }} />
        	                    <p>Нет</p>
        	                </div>
        	            </div>
        	        </div>

        			@if (count($item->goods))
        		        <div>
        		        	<p>Товары:</p>
        		        	@foreach ($item->goods as $good)
        		        		<p>{{ $good->name }} {{ $good->price }}{{ $good->currency }}</p>
        		        	@endforeach
        		        </div>
        	        @endif

        	    </div>
        		    <div class="buttons-group hide">
        		    	<a href="{{ url()->previous() }}">Отменить изменения <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.277344 7.03233L8.09108 13.8694V9.90854C10.5498 9.64637 12.5824 10.3457 14.2515 12.0147L15.5196 13.2828V11.4894C15.5196 6.83507 12.9558 4.30712 8.09108 4.07803V0.195312L0.277344 7.03233ZM2.53471 7.03278L6.60657 3.4699V5.54708H7.34942C11.2127 5.54708 13.3297 6.92211 13.8856 9.79361C11.9964 8.52925 9.76382 8.10583 7.2273 8.52859L6.60657 8.63204V10.5957L2.53471 7.03278Z" fill="#515151"/></svg></a>
        	            <button type="submit">Сохранить изменения <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.67902 0.46875H11.4909L13.9249 2.97016V12.7147C13.9249 13.4661 13.3157 14.0753 12.5643 14.0753H1.67902C0.927546 14.0753 0.318359 13.4661 0.318359 12.7147V1.82941C0.318359 1.07794 0.927546 0.46875 1.67902 0.46875ZM10.5233 1.83011V5.91208H3.72002V1.83011H1.67904V12.7154H3.03969V7.27274H11.2036V12.7154H12.5643V3.52362L10.9164 1.83011H10.5233ZM5.07843 4.55142V1.83011H9.1604V4.55142H5.07843ZM4.40039 8.63349V12.7155H9.84302V8.63349H4.40039ZM8.4824 2.51045H7.12174V3.8711H8.4824V2.51045Z" fill="white"/></svg>

        	            </button>
        	        </div>
        	</div>
	    </form>
	</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('recipient_select').addEventListener('change', function() {
                document.getElementById('recipient_id').value = this.value;
            });

            document.querySelector('form').addEventListener('submit', function(e) {
                if (!document.getElementById('recipient_id').value) {
                    alert('Поле "Получатель" обязательно для заполнения');
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>


	<script>
		$(function(){
		    $("#recipient").autocomplete({
		      source: "{{ route('ajax.recipient') }}",
		      minLength: 2,
		      select: function( event, ui ) {
		      	$('#recipient_id').val(ui.item.recipient);
		      	$('#user_id').val(ui.item.user);
		      }
		    });

            $('#add').click(function(){
                var $clone = $('#goods .good').eq(0).clone();
                $clone.find('input').val('');
                $('#goods .value').hide();
                $('#goods .remove').show();
                $clone.find('.value').show();
                $clone.find('.remove').hide();
                $clone.appendTo("#goods");
                calc();
            });

            $('#goods').on('click','.remove',function(e){
                e.preventDefault();
                $(this).parents('.good').remove();
                calc();
            });

            $('#goods').on('change','.good_currency',function(){
                calc();
            });
            $('#goods').on('keyup','.good_price',function(){
                calc();
            });
            function calc(){
                var total = 0;
                $('#goods .good').each(function(i,o){
                    var price = parseFloat($(o).find('.good_price').val());
                    if(!price) price = 0;
                    if($(o).find('.good_currency').val()!='$')
                        price = Math.ceil(price+(price/100*22));
                    total += price;
                });
                $('.itog span').html(total+'$');
            }
		});
        document.addEventListener('DOMContentLoaded', function() {
            const ch1 = document.getElementById('ch-1');
            const ch2 = document.getElementById('ch-2');

            function toggleCheckboxes() {
                if (this.checked) {
                    if (this === ch1) {
                        ch2.checked = false;
                    } else {
                        ch1.checked = false;
                    }
                } else {
                    if (!ch1.checked && !ch2.checked) {
                        ch2.checked = true;
                    }
                }
            }

            ch1.addEventListener('change', toggleCheckboxes);
            ch2.addEventListener('change', toggleCheckboxes);
        });
	</script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#recipient_select').select2({
                placeholder: "Выберите получателя",
                allowClear: true,
                width: '100%',
            });

            $('#recipient_select').on('change', function() {
                let selectedRecipientId = $(this).val();
                let selectedUserId = $(this).find(':selected').data('user-id');

                $('#recipient_id').val(selectedRecipientId);
                $('#user_id').val(selectedUserId);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const functionsSelect = document.getElementById('functions');
            const additionalFieldsContainer = document.getElementById('additional-fields-container');

            functionsSelect.addEventListener('change', function() {
                // Clear existing input fields
                additionalFieldsContainer.innerHTML = '';

                // Add input fields for each selected function
                Array.from(this.selectedOptions).forEach(option => {
                    if (option.value) {
                        const functionId = option.value;

                        // Create container for additional inputs
                        const container = document.createElement('div');
                        container.classList.add('additional-fields');
                        container.dataset.functionId = functionId;

                        // Create input for description
                        const descriptionLabel = document.createElement('label');
                        descriptionLabel.textContent = `Описание для ${option.text}:`;
                        container.appendChild(descriptionLabel);
                        const descriptionInput = document.createElement('input');
                        descriptionInput.type = 'text';
                        descriptionInput.name = `additional_functions_descriptions[${functionId}]`;
                        container.appendChild(descriptionInput);

                        // Create input for price
                        const priceLabel = document.createElement('label');
                        priceLabel.textContent = `Цена для ${option.text}:`;
                        container.appendChild(priceLabel);
                        const priceInput = document.createElement('input');
                        priceInput.type = 'number';
                        priceInput.name = `additional_functions_prices[${functionId}]`;
                        container.appendChild(priceInput);

                        additionalFieldsContainer.appendChild(container);
                    }
                });
            });
        });
    </script>
@endsection
