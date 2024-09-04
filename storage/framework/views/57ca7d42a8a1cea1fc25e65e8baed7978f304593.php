<div class="header-top flex flex-wrap between align-center">
    <div class="logo">
        <a href="/">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="ORYX">
        </a>
    </div>

    <?php if(auth()->guard()->check()): ?>
        <div class="menu-btn_wrap menu-btn_wrap1">
            <div class="pers-area">
                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.42779 5.52686V8.26415H2.51445C1.53958 8.26415 0.689453 8.97259 0.689453 9.93706V17.5412C0.689453 18.5057 1.53958 19.2141 2.51445 19.2141H13.4645C14.4393 19.2141 15.2895 18.5057 15.2895 17.5412V9.93706C15.2895 8.97259 14.4393 8.26415 13.4645 8.26415H12.5528V5.52686C12.5528 3.00706 10.5101 0.964355 7.99029 0.964355C5.47049 0.964355 3.42779 3.00706 3.42779 5.52686ZM10.7278 5.52686V8.26415H5.25279V5.52686C5.25279 4.01498 6.47841 2.78936 7.99029 2.78936C9.50217 2.78936 10.7278 4.01498 10.7278 5.52686ZM2.51361 17.3893V10.0893H13.4636V17.3893H2.51361ZM8.90111 13.7391C8.90111 14.2431 8.49257 14.6516 7.98861 14.6516C7.48465 14.6516 7.07611 14.2431 7.07611 13.7391C7.07611 13.2352 7.48465 12.8266 7.98861 12.8266C8.49257 12.8266 8.90111 13.2352 8.90111 13.7391Z"
                          fill="#DC1E52"></path>
                </svg>
                <a href="/profile">Личный кабинет</a>
                <!--<span class="item-numbers">0</span>-->
                <div class="dropdown-area">
                    <div class="account-date">
                        <p class="name-surname" style="margin-bottom: 5px;"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?></p>
                        <p class="account-email"><?php echo e(Str::limit(Auth::user()->email, 22, '..')); ?></p>
                    </div>
                    <div class="drop-links">
                        <a href="/profile">Мой профиль</a>
                        <a href="/profile/parcels">Мои посылки</a>
                        <a href="/profile/addresses">Мои адреса</a>
                        <a href="/profile/parcels/create">Добавить посылку</a>
                        <a href="/profile/transactions">Мои транзакции</a>
                        <a href="/profile/settings">Настройки аккаунта</a>
                        <a href="/profile/notifications">Мои уведомления</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
        <div class="menu-btn_wrap menu-btn_wrap2">
            <a class="bt btn-orange btn-login" href="/login">
                <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.8635 9.57529H14.9745V6.46398C14.9745 3.18173 12.3077 0.514893 9.02543 0.514893C5.74318 0.514893 3.07634 3.18173 3.07634 6.46398V9.57529H2.1874C1.5036 9.57529 0.922363 10.1565 0.922363 10.8403V11.5925V20.3452V21.0974C0.922363 21.7812 1.5036 22.3624 2.1874 22.3624H9.02543H15.8635C16.5473 22.3624 17.1285 21.7812 17.1285 21.0974V20.3452V11.5925V10.8403C17.1285 10.1565 16.5473 9.57529 15.8635 9.57529ZM10.3589 18.6015H7.65783L8.13649 16.3108C7.69202 16.0372 7.38431 15.5244 7.38431 14.9431C7.38431 14.0542 8.1023 13.3362 8.99124 13.3362C9.88019 13.3362 10.5982 14.0542 10.5982 14.9431C10.5982 15.5244 10.2905 16.003 9.846 16.3108L10.3589 18.6015ZM9.02543 9.57529H5.19613V6.46398C5.19613 4.34419 6.90564 2.63468 9.02543 2.63468C11.1452 2.63468 12.8547 4.34419 12.8547 6.46398V9.57529H9.02543Z" fill="white"></path>
                </svg>
                Вход
            </a>
            <a class="bt orange-link btn-register" href="/register">Регистрация</a>
        </div>
    <?php endif; ?>
    <a href="#menu" class="openMenu">
        <svg class="hamb hamb6" viewBox="0 0 100 100" width="50">
            <path class="line top"
                  d="m 30,33 h 40 c 13.100415,0 14.380204,31.80258 6.899646,33.421777 -24.612039,5.327373 9.016154,-52.337577 -12.75751,-30.563913 l -28.284272,28.284272"></path>
            <path class="line middle"
                  d="m 70,50 c 0,0 -32.213436,0 -40,0 -7.786564,0 -6.428571,-4.640244 -6.428571,-8.571429 0,-5.895471 6.073743,-11.783399 12.286435,-5.570707 6.212692,6.212692 28.284272,28.284272 28.284272,28.284272"></path>
            <path class="line bottom"
                  d="m 69.575405,67.073826 h -40 c -13.100415,0 -14.380204,-31.80258 -6.899646,-33.421777 24.612039,-5.327373 -9.016154,52.337577 12.75751,30.563913 l 28.284272,-28.284272"></path>
        </svg>
    </a>
</div>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/components/header.blade.php ENDPATH**/ ?>