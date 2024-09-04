<div class="menuside">

<div class="menu-up">

	<div class="menulinks">
	    <ul class="navs">

	        <li class="<?php echo e(request()->is('*admins*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('admins.index')); ?>">
	                <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9019 8.90625C10.038 8.90625 8.47192 7.63148 8.02787 5.90625H0.901855V3.90625H8.02787C8.47192 2.18102 10.038 0.90625 11.9019 0.90625C14.111 0.90625 15.9019 2.69711 15.9019 4.90625C15.9019 7.11539 14.111 8.90625 11.9019 8.90625ZM17.9019 3.90625H20.9019V5.90625H17.9019V3.90625ZM6.90186 18.9062C5.03802 18.9062 3.47192 17.6315 3.02787 15.9062H0.901855V13.9062H3.02787C3.47192 12.181 5.03802 10.9062 6.90186 10.9062C9.11099 10.9062 10.9019 12.6971 10.9019 14.9062C10.9019 17.1154 9.11099 18.9062 6.90186 18.9062ZM12.9019 15.9062H20.9019V13.9062H12.9019V15.9062ZM8.90186 14.9062C8.90186 16.0108 8.00642 16.9062 6.90186 16.9062C5.79729 16.9062 4.90186 16.0108 4.90186 14.9062C4.90186 13.8017 5.79729 12.9062 6.90186 12.9062C8.00642 12.9062 8.90186 13.8017 8.90186 14.9062ZM13.9019 4.90625C13.9019 6.01082 13.0064 6.90625 11.9019 6.90625C10.7973 6.90625 9.90186 6.01082 9.90186 4.90625C9.90186 3.80168 10.7973 2.90625 11.9019 2.90625C13.0064 2.90625 13.9019 3.80168 13.9019 4.90625Z" fill="#666666"/>
                    </svg>
	                Администрирование
                </a>
            </li>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('finance')): ?>
	        <li class="hide <?php echo e(request()->is('*finance*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('finance.index')); ?>">
	                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0445 4.50195V7.62919H7.3984V4.50195H5.95508V8.35083C5.95508 8.74943 6.27816 9.07251 6.67676 9.07251H10.7662C11.1648 9.07251 11.4879 8.74943 11.4879 8.35083V4.50195H10.0445Z" fill="#333333"/><path d="M19.3057 0.892578H3.91011C3.71887 0.892578 3.5351 0.968591 3.39991 1.10401L0.513191 3.99069C0.377771 4.12588 0.301758 4.30965 0.301758 4.5009V18.3569C0.301758 18.7555 0.624841 19.0786 1.02344 19.0786H16.419C16.6105 19.0786 16.794 19.0024 16.9292 18.8672L19.8159 15.9805C19.9513 15.8453 20.0273 15.6618 20.0273 15.4703V1.61422C20.0273 1.21562 19.7043 0.892578 19.3057 0.892578ZM18.584 15.1715L16.1202 17.6352H1.74508V4.7999L4.20908 2.3359H18.584V15.1715H18.584Z" fill="#333333"/><path d="M18.7955 1.10547L16.1202 3.78067H1.02344V5.22399H16.419C16.6105 5.22399 16.794 5.14798 16.9292 5.01256L19.8159 2.12588L18.7955 1.10547Z" fill="#333333"/><path d="M17.1406 4.50195H15.6973V18.358H17.1406V4.50195Z" fill="#333333"/></svg> Финансы
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transactions')): ?>
	        <li class="<?php echo e(request()->is('*transactions*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('transactions.index')); ?>">
	                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.10254 0.542969H17.8789C18.7416 0.542969 19.4409 1.31224 19.4409 2.26119V12.5705C19.4409 13.5194 18.7416 14.2887 17.8789 14.2887H9.13161V12.5706H17.7227V6.55788H2.25875V8.2761H0.540527V2.26119C0.540527 1.31224 1.23987 0.542969 2.10254 0.542969ZM17.7227 2.26131V4.83967H2.25875V2.26131H17.7227ZM0.540527 12.5705H4.48022L3.36948 13.6812L4.58444 14.8962L7.76925 11.7114L4.58444 8.52655L3.36948 9.74151L4.48022 10.8522H0.540527V12.5705Z" fill="#666666"/>
                        </svg>
                         Транзакции
                </a>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings')): ?>
	        <li class="<?php echo e(request()->is('*settings*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('settings.index')); ?>">
	                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0813 16.1092L15.8366 14.354L15.2184 12.1081L15.4877 11.4649L17.5202 10.318V7.83586L15.4935 6.68421L15.2287 6.04212L15.8546 3.79512L14.0981 2.04116L11.8521 2.65918L11.2103 2.39009L10.0633 0.357422H7.58115L6.4295 2.38412L5.78756 2.64887L3.54092 2.02215L1.78716 3.77591L2.40527 6.02233L2.13618 6.66411L0.103516 7.81108V10.2925L2.12839 11.4468L2.39343 12.0894L1.76757 14.336L3.522 16.0904L5.76842 15.4723L6.41028 15.7415L7.55727 17.7733H10.0388L11.1922 15.7484L11.8347 15.4834L14.0813 16.1092ZM14.2369 10.3527L13.5467 12.0011L14.0655 13.8859L13.6155 14.3359L11.7347 13.8119L10.0856 14.492L9.11849 16.19H8.48166L7.52255 14.4909L5.87599 13.8006L3.99018 14.3195L3.54095 13.8702L4.0649 11.9894L3.38483 10.3404L1.68685 9.37257V8.73566L3.38664 7.77653L4.07704 6.1299L3.55815 4.24408L4.00644 3.79579L5.88724 4.32047L7.53691 3.64011L8.50255 1.94076H9.13874L10.0979 3.64054L11.7445 4.33095L13.6307 3.81196L14.081 4.26165L13.5572 6.1421L14.2375 7.79161L15.9368 8.75725V9.39345L14.2369 10.3527ZM8.81185 12.2324C7.06295 12.2324 5.64518 10.8147 5.64518 9.06576C5.64518 7.31685 7.06295 5.89909 8.81185 5.89909C10.5608 5.89909 11.9785 7.31685 11.9785 9.06576C11.9785 10.8147 10.5608 12.2324 8.81185 12.2324ZM10.3952 9.06575C10.3952 9.94021 9.6863 10.6491 8.81185 10.6491C7.9374 10.6491 7.22852 9.94021 7.22852 9.06575C7.22852 8.1913 7.9374 7.48242 8.81185 7.48242C9.6863 7.48242 10.3952 8.1913 10.3952 9.06575Z" fill="#333333"/></svg> Настройки
                </a>
            </li>
            <?php endif; ?>

                <li class="<?php echo e(request()->is('*roles*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('roles.index')); ?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.11816 18.0781C4.15245 18.0781 0.126953 14.0526 0.126953 9.08691C0.126953 4.1212 4.15245 0.0957031 9.11816 0.0957031C14.0839 0.0957031 18.1094 4.1212 18.1094 9.08691C18.1094 14.0526 14.0839 18.0781 9.11816 18.0781ZM15.1662 13.2764C15.9913 12.0876 16.4748 10.6438 16.4748 9.0871C16.4748 5.02425 13.1812 1.73066 9.11835 1.73066C5.0555 1.73066 1.76191 5.02425 1.76191 9.0871C1.76191 10.6434 2.24519 12.0868 3.06986 13.2755C3.98635 12.0656 6.13442 11.5435 9.08254 11.5394C7.26961 11.5225 5.84931 10.2356 5.84931 7.45263C5.84931 5.61823 7.14004 4.1831 9.11884 4.1831C11.0922 4.1831 12.3884 5.75376 12.3884 7.6161C12.3884 10.2789 10.9512 11.5229 9.15507 11.5394C12.1028 11.5437 14.2503 12.0661 15.1662 13.2764ZM13.9932 14.5965C13.7544 13.7361 12.0357 13.1741 9.11771 13.1741C6.20077 13.1741 4.48223 13.7357 4.24244 14.5956C5.54048 15.7455 7.24789 16.4435 9.11835 16.4435C10.9883 16.4435 12.6953 15.7458 13.9932 14.5965ZM7.48427 7.45175C7.48427 9.3066 8.15306 9.9039 9.11903 9.9039C10.0817 9.9039 10.7538 9.33042 10.7538 7.61523C10.7538 6.59384 10.1127 5.81699 9.11903 5.81699C8.08401 5.81699 7.48427 6.48383 7.48427 7.45175Z" fill="#333333"/></svg> Роли
                    </a>
                </li>

                <li class="<?php echo e(request()->is('*additional_functions*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('additional-functions.index')); ?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.11816 18.0781C4.15245 18.0781 0.126953 14.0526 0.126953 9.08691C0.126953 4.1212 4.15245 0.0957031 9.11816 0.0957031C14.0839 0.0957031 18.1094 4.1212 18.1094 9.08691C18.1094 14.0526 14.0839 18.0781 9.11816 18.0781ZM15.1662 13.2764C15.9913 12.0876 16.4748 10.6438 16.4748 9.0871C16.4748 5.02425 13.1812 1.73066 9.11835 1.73066C5.0555 1.73066 1.76191 5.02425 1.76191 9.0871C1.76191 10.6434 2.24519 12.0868 3.06986 13.2755C3.98635 12.0656 6.13442 11.5435 9.08254 11.5394C7.26961 11.5225 5.84931 10.2356 5.84931 7.45263C5.84931 5.61823 7.14004 4.1831 9.11884 4.1831C11.0922 4.1831 12.3884 5.75376 12.3884 7.6161C12.3884 10.2789 10.9512 11.5229 9.15507 11.5394C12.1028 11.5437 14.2503 12.0661 15.1662 13.2764ZM13.9932 14.5965C13.7544 13.7361 12.0357 13.1741 9.11771 13.1741C6.20077 13.1741 4.48223 13.7357 4.24244 14.5956C5.54048 15.7455 7.24789 16.4435 9.11835 16.4435C10.9883 16.4435 12.6953 15.7458 13.9932 14.5965ZM7.48427 7.45175C7.48427 9.3066 8.15306 9.9039 9.11903 9.9039C10.0817 9.9039 10.7538 9.33042 10.7538 7.61523C10.7538 6.59384 10.1127 5.81699 9.11903 5.81699C8.08401 5.81699 7.48427 6.48383 7.48427 7.45175Z" fill="#333333"/></svg> Дополнительные функции
                    </a>
                </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
	        <li class="<?php echo e(request()->is('*users*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('users.index')); ?>">
	                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.11816 18.0781C4.15245 18.0781 0.126953 14.0526 0.126953 9.08691C0.126953 4.1212 4.15245 0.0957031 9.11816 0.0957031C14.0839 0.0957031 18.1094 4.1212 18.1094 9.08691C18.1094 14.0526 14.0839 18.0781 9.11816 18.0781ZM15.1662 13.2764C15.9913 12.0876 16.4748 10.6438 16.4748 9.0871C16.4748 5.02425 13.1812 1.73066 9.11835 1.73066C5.0555 1.73066 1.76191 5.02425 1.76191 9.0871C1.76191 10.6434 2.24519 12.0868 3.06986 13.2755C3.98635 12.0656 6.13442 11.5435 9.08254 11.5394C7.26961 11.5225 5.84931 10.2356 5.84931 7.45263C5.84931 5.61823 7.14004 4.1831 9.11884 4.1831C11.0922 4.1831 12.3884 5.75376 12.3884 7.6161C12.3884 10.2789 10.9512 11.5229 9.15507 11.5394C12.1028 11.5437 14.2503 12.0661 15.1662 13.2764ZM13.9932 14.5965C13.7544 13.7361 12.0357 13.1741 9.11771 13.1741C6.20077 13.1741 4.48223 13.7357 4.24244 14.5956C5.54048 15.7455 7.24789 16.4435 9.11835 16.4435C10.9883 16.4435 12.6953 15.7458 13.9932 14.5965ZM7.48427 7.45175C7.48427 9.3066 8.15306 9.9039 9.11903 9.9039C10.0817 9.9039 10.7538 9.33042 10.7538 7.61523C10.7538 6.59384 10.1127 5.81699 9.11903 5.81699C8.08401 5.81699 7.48427 6.48383 7.48427 7.45175Z" fill="#333333"/></svg> Пользователи
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recipients')): ?>
	        <li class="<?php echo e(request()->is('*recipients*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('recipients.index')); ?>">
	                <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">	<path fill-rule="evenodd" clip-rule="evenodd" d="M9.11816 18.6973C4.15245 18.6973 0.126953 14.6718 0.126953 9.70605C0.126953 4.74034 4.15245 0.714844 9.11816 0.714844C14.0839 0.714844 18.1094 4.74034 18.1094 9.70605C18.1094 14.6718 14.0839 18.6973 9.11816 18.6973ZM15.1662 13.8955C15.9913 12.7067 16.4748 11.2629 16.4748 9.70624C16.4748 5.64339 13.1812 2.3498 9.11835 2.3498C5.0555 2.3498 1.76191 5.64339 1.76191 9.70624C1.76191 11.2625 2.24519 12.706 3.06986 13.8946C3.98635 12.6847 6.13442 12.1626 9.08254 12.1585C7.26961 12.1416 5.84931 10.8547 5.84931 8.07177C5.84931 6.23737 7.14004 4.80224 9.11884 4.80224C11.0922 4.80224 12.3884 6.3729 12.3884 8.23524C12.3884 10.8981 10.9512 12.142 9.15507 12.1585C12.1028 12.1629 14.2503 12.6853 15.1662 13.8955ZM13.9932 15.2157C13.7544 14.3552 12.0357 13.7932 9.11771 13.7932C6.20077 13.7932 4.48223 14.3548 4.24244 15.2148C5.54048 16.3646 7.24789 17.0627 9.11835 17.0627C10.9883 17.0627 12.6953 16.365 13.9932 15.2157ZM7.48427 8.07089C7.48427 9.92574 8.15306 10.523 9.11903 10.523C10.0817 10.523 10.7538 9.94956 10.7538 8.23437C10.7538 7.21298 10.1127 6.43613 9.11903 6.43613C8.08401 6.43613 7.48427 7.10297 7.48427 8.07089Z" fill="#333333"/><rect x="11.2656" y="8.97852" width="12.8146" height="9.47719" fill="white" stroke="#333333" stroke-width="1.5"/><rect x="16.6348" y="11.5488" width="2.07617" height="3.0293" fill="#333333"/><path d="M15.4414 14.2324H19.9054V15.0321L17.6734 17.0321L15.4414 15.0321V14.2324Z" fill="#333333"/>
                    <?php
                        $p1 = App\Models\Recipient::where('confirm',0)->whereNull('registration');
                        $p2 = App\Models\Parcel::where('status',0);
                        if (Auth::user()->city) {
                            $p1->where('city', Auth::user()->city);
                            $p2->where('city', Auth::user()->city);
                        }
                        $p1 = $p1->count();
                        $p2 = $p2->count();
                    ?>
                    </svg> Получатели (<?php echo e($p1); ?>)
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('parcels')): ?>
	        <li class="<?php echo e(request()->is('*parcels*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('parcels.index')); ?>">
	                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0445 4.50195V7.62919H7.3984V4.50195H5.95508V8.35083C5.95508 8.74943 6.27816 9.07251 6.67676 9.07251H10.7662C11.1648 9.07251 11.4879 8.74943 11.4879 8.35083V4.50195H10.0445Z" fill="#333333"/><path d="M19.3057 0.892578H3.91011C3.71887 0.892578 3.5351 0.968591 3.39991 1.10401L0.513191 3.99069C0.377771 4.12588 0.301758 4.30965 0.301758 4.5009V18.3569C0.301758 18.7555 0.624841 19.0786 1.02344 19.0786H16.419C16.6105 19.0786 16.794 19.0024 16.9292 18.8672L19.8159 15.9805C19.9513 15.8453 20.0273 15.6618 20.0273 15.4703V1.61422C20.0273 1.21562 19.7043 0.892578 19.3057 0.892578ZM18.584 15.1715L16.1202 17.6352H1.74508V4.7999L4.20908 2.3359H18.584V15.1715H18.584Z" fill="#333333"/><path d="M18.7955 1.10547L16.1202 3.78067H1.02344V5.22399H16.419C16.6105 5.22399 16.794 5.14798 16.9292 5.01256L19.8159 2.12588L18.7955 1.10547Z" fill="#333333"/><path d="M17.1406 4.50195H15.6973V18.358H17.1406V4.50195Z" fill="#333333"/></svg> Посылки (<?php echo e($p2); ?>)
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ind')): ?>
            <li class="hide <?php echo e(request()->is('*ind*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('ind.index')); ?>">
                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0445 4.50195V7.62919H7.3984V4.50195H5.95508V8.35083C5.95508 8.74943 6.27816 9.07251 6.67676 9.07251H10.7662C11.1648 9.07251 11.4879 8.74943 11.4879 8.35083V4.50195H10.0445Z" fill="#333333"/><path d="M19.3057 0.892578H3.91011C3.71887 0.892578 3.5351 0.968591 3.39991 1.10401L0.513191 3.99069C0.377771 4.12588 0.301758 4.30965 0.301758 4.5009V18.3569C0.301758 18.7555 0.624841 19.0786 1.02344 19.0786H16.419C16.6105 19.0786 16.794 19.0024 16.9292 18.8672L19.8159 15.9805C19.9513 15.8453 20.0273 15.6618 20.0273 15.4703V1.61422C20.0273 1.21562 19.7043 0.892578 19.3057 0.892578ZM18.584 15.1715L16.1202 17.6352H1.74508V4.7999L4.20908 2.3359H18.584V15.1715H18.584Z" fill="#333333"/><path d="M18.7955 1.10547L16.1202 3.78067H1.02344V5.22399H16.419C16.6105 5.22399 16.794 5.14798 16.9292 5.01256L19.8159 2.12588L18.7955 1.10547Z" fill="#333333"/><path d="M17.1406 4.50195H15.6973V18.358H17.1406V4.50195Z" fill="#333333"/></svg> На доставке
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notifications')): ?>
	        <li class="hide <?php echo e(request()->is('*notifications*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('notifications.index')); ?>">
	                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.41016 18.5859C11.0111 18.5859 12.5544 18.1793 13.9213 17.4179L17.8529 17.7455L17.5253 13.8139C18.2867 12.447 18.6934 10.9037 18.6934 9.30273C18.6934 4.17576 14.5371 0.0195312 9.41016 0.0195312C4.28318 0.0195312 0.126953 4.17576 0.126953 9.30273C0.126953 14.4297 4.28318 18.5859 9.41016 18.5859ZM13.2302 15.673L13.487 15.5186L15.8205 15.7131L15.626 13.3795L15.7804 13.1228C16.4682 11.9785 16.8367 10.6688 16.8367 9.30273C16.8367 5.20116 13.5117 1.87617 9.41016 1.87617C5.30858 1.87617 1.98359 5.20116 1.98359 9.30273C1.98359 13.4043 5.30858 16.7293 9.41016 16.7293C10.7762 16.7293 12.086 16.3608 13.2302 15.673ZM9.41046 13.9425C9.92333 13.9425 10.3391 13.5269 10.3391 13.0142C10.3391 12.5015 9.92333 12.0859 9.41046 12.0859C8.8976 12.0859 8.48184 12.5015 8.48184 13.0142C8.48184 13.5269 8.8976 13.9425 9.41046 13.9425ZM8.48184 11.1594H10.3385V10.2311C10.3385 10.2333 10.3429 10.2285 10.3528 10.2175C10.3772 10.1907 10.4349 10.1271 10.5432 10.0412C10.6362 9.96742 10.665 9.94831 10.8999 9.79937C11.6994 9.29252 12.1951 8.41114 12.1951 7.44609C12.1951 5.908 10.9482 4.66113 9.41016 4.66113C7.87207 4.66113 6.6252 5.908 6.6252 7.44609H8.48184C8.48184 6.9334 8.89746 6.51777 9.41016 6.51777C9.92285 6.51777 10.3385 6.9334 10.3385 7.44609C10.3385 7.76852 10.1737 8.06145 9.90585 8.23128C9.60526 8.42184 9.55536 8.4549 9.38926 8.58667C8.83714 9.02468 8.48184 9.5466 8.48184 10.2311V11.1594Z" fill="#333333"/></svg> Уведомления
                </a>
            </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cashback')): ?>
			<li class="hide <?php echo e(request()->is('*cashback*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('admin.cashback')); ?>">
	                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.9253 0.796875H17.7017C18.5643 0.796875 19.2637 1.56615 19.2637 2.51509V12.8244C19.2637 13.7733 18.5643 14.5426 17.7017 14.5426H8.95437V12.8245H17.5455V6.81179H2.0815V8.53001H0.363281V2.51509C0.363281 1.56615 1.06262 0.796875 1.9253 0.796875ZM17.5455 2.51522V5.09357H2.0815V2.51522H17.5455ZM0.363281 12.8244H4.30297L3.19223 13.9351L4.4072 15.1501L7.592 11.9653L4.4072 8.78045L3.19223 9.99542L4.30297 11.1062H0.363281V12.8244Z" fill="#333333"/></svg>
                    Кэшбек
                </a>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('instead')): ?>
	        <li class="hide <?php echo e(request()->is('*instead*') ? 'active' : ''); ?>">
	            <a href="<?php echo e(route('instead.index')); ?>">
	                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.6331 0.439409C13.5697 0.171808 14.5459 0.714143 14.8135 1.65075C14.8585 1.80832 14.8814 1.9714 14.8814 2.13528L14.8814 3.61093H16.6451C17.6192 3.61093 18.4088 4.40058 18.4088 5.37466V15.9571C18.4088 16.9312 17.6192 17.7208 16.6451 17.7208H2.53522C1.56114 17.7208 0.771484 16.9312 0.771484 15.9571H0.794894C0.779332 15.8625 0.771484 15.7667 0.771484 15.6707V5.15883C0.771484 4.37136 1.29351 3.67929 2.05068 3.46296L12.6331 0.439409ZM7.95289 15.9571H16.6451L16.6451 8.90213H14.8814V12.6471C14.8814 13.4346 14.3593 14.1267 13.6022 14.343L7.95289 15.9571ZM16.6451 5.37466L16.6451 7.1384H14.8814L14.8814 5.37466H16.6451ZM2.53522 5.15838V15.6702L13.1176 12.6467V2.13483L2.53522 5.15838ZM11.3539 7.1384C11.3539 7.62544 10.9591 8.02027 10.472 8.02027C9.98499 8.02027 9.59017 7.62544 9.59017 7.1384C9.59017 6.65136 9.98499 6.25653 10.472 6.25653C10.9591 6.25653 11.3539 6.65136 11.3539 7.1384Z" fill="#333333"/></svg> Помощь при покупке
                </a>
            </li>
            <?php endif; ?>
	    </ul>
	</div>
	</div>
	<div class="exit">
	    <form action="<?php echo e(route('logout')); ?>" method="POST">
	    	<?php echo csrf_field(); ?>
	        <button type="submit"><svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.3127 8.79492H4.72686L8.01976 5.50203L6.60554 4.08782L0.898438 9.79492L6.60554 15.502L8.01976 14.0878L4.72686 10.7949H15.3127V8.79492ZM19.3127 0.794922H10.3127V2.79492L19.3127 2.79492V16.7949H10.3127V18.7949H19.3127C20.4172 18.7949 21.3127 17.8995 21.3127 16.7949V2.79492C21.3127 1.69035 20.4172 0.794922 19.3127 0.794922Z" fill="#333333"/></svg>LOG OUT</button>
	    </form>
	</div>

</div>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/admin/partials/left.blade.php ENDPATH**/ ?>