<div class="custom">
    <footer id="footer">

        <div class="container">

            <div class="footer-top">

                <div class="flex flex-wrap between">
                    <div class="footer-left">
                        <a href="tel:+77003232222">
                            <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.58115 10.1025C6.40348 13.6839 9.33946 16.6072 12.9209 18.4422L15.705 15.6581C16.0467 15.3164 16.5529 15.2025 16.9958 15.3543C18.4132 15.8226 19.9444 16.0757 21.5137 16.0757C22.2097 16.0757 22.7792 16.6452 22.7792 17.3412V21.7578C22.7792 22.4538 22.2097 23.0233 21.5137 23.0233C9.63053 23.0233 0 13.3928 0 1.50965C0 0.81362 0.56948 0.244141 1.26551 0.244141H5.6948C6.39083 0.244141 6.96031 0.81362 6.96031 1.50965C6.96031 3.09154 7.21341 4.61015 7.68165 6.02752C7.82085 6.47045 7.71961 6.964 7.36527 7.31834L4.58115 10.1025Z"
                                      fill="white"></path></svg>
                            +7 700 323 22 22</a>
                        <a href="https://api.whatsapp.com/send?phone=77475155613">  <!--77755244912-->
                            <svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.6904 15.3034L17.6814 15.3786C15.4767 14.2798 15.2461 14.1334 14.9614 14.5605C14.7638 14.8563 14.1884 15.527 14.0149 15.7255C13.8394 15.921 13.665 15.9361 13.3672 15.8007C13.0664 15.6503 12.1009 15.3345 10.958 14.3119C10.0677 13.5148 9.47012 12.5373 9.29366 12.2365C8.9999 11.7292 9.61449 11.657 10.1739 10.5982C10.2742 10.3877 10.2231 10.2223 10.1489 10.0729C10.0737 9.92248 9.47513 8.44866 9.22448 7.86114C8.98386 7.27562 8.73622 7.34981 8.55073 7.34981C7.97324 7.29968 7.55114 7.3077 7.17918 7.69471C5.56098 9.47332 5.96904 11.3081 7.35363 13.2591C10.0747 16.8204 11.5244 17.4761 14.1753 18.3864C14.8912 18.614 15.5439 18.5819 16.0602 18.5077C16.6357 18.4165 17.8318 17.7849 18.0814 17.078C18.3371 16.3712 18.3371 15.7847 18.2619 15.6493C18.1877 15.514 17.9912 15.4388 17.6904 15.3034Z"
                                    fill="white"></path>
                                <path
                                    d="M20.712 4.41836C13.003 -3.03396 0.244947 2.37105 0.239934 12.8843C0.239934 14.9858 0.790361 17.0351 1.83908 18.8448L0.138672 25.0228L6.49014 23.3665C14.4157 27.6476 24.197 21.9628 24.2011 12.8903C24.2011 9.70607 22.9578 6.7093 20.697 4.45746L20.712 4.41836ZM22.1979 12.8572C22.1918 20.5101 13.7911 25.2895 7.14684 21.3833L6.78591 21.1688L3.02616 22.1463L4.03377 18.4918L3.79415 18.1159C-0.340571 11.5338 4.40974 2.93151 12.2421 2.93151C14.9029 2.93151 17.4004 3.9692 19.2813 5.84907C21.1612 7.7129 22.1979 10.2104 22.1979 12.8572Z"
                                    fill="white"></path>
                            </svg>
                            +7 747 515 56 13
                        </a>
                    </div>
                    <?php if(auth()->guard()->check()): ?>
                        <div class="footer-right">
                            <a href="/profile" class="bt btn-gray footer-btn">
                                личный кабинет
                            </a>
                            <?php if(Auth::user()->roles()->first()->id <= 2): ?>
                                <a href="/panel" class="bt btn-gray footer-btn">
                                    Вход для сотрудников
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="footer-right">
                            <a href="/login" class="bt btn-gray footer-btn">
                                Войти в личный кабинет
                            </a>
                            <a href="/register" class="bt btn-gray footer-btn">
                                Регистрация в ЛК
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-md-7 col-sm-8">
                        <div style="padding-top: 15px;" class="subscribe-edit">
                            <form action="/email" method="post" class="subscribe-form" novalidate="novalidate" style="min-width: 350px; max-width: 500px">
                                <input id="num" style="margin-right: -40px; font-size: 22px; padding: 23px; padding-right: 60px; border-radius: 25px; width: 100%" size="30" type="tel" maxlength="255" name="name" class="form-control subscribe-input required" placeholder="Имя" required="required" aria-required="true" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
                                <br>
                                <div class="" style="display: flex; justify-content: start; align-items: center">
                                    <?php echo csrf_field(); ?>

                                    <input id="num" style="margin-right: -40px; font-size: 22px; padding: 23px; padding-right: 60px; border-radius: 25px; width: 100%" size="30" type="tel" maxlength="255" name="email" class="form-control subscribe-input required" placeholder="Введите емаил или номер" required="required" aria-required="true" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
                                    <button style="border-radius: 25px; background-color: #e65a57; color: white;" type="submit" class="btn btn-default btn-lg subscribe-btn round-ignore">
                                        Отправить
                                    </button>
                                </div>
                                <script>
                                    /*$("#num").keypress(function(event){
                                        event = event || window.event;
                                        if (event.charCode && event.charCode!=0 && event.charCode!=46 && (event.charCode < 48 || event.charCode > 57) )
                                            return false;
                                    });*/
                                </script>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


            <div class="footer-center flex flex-wrap between">

                <div class="footer-logo">
                    <a href="\">
                        <img src=" <?php echo e(asset('assets/images/footerlogo.png')); ?>" alt="footerlogo">
                    </a>
                </div>

                <div class="footer-item footer-item1">
                    <div class="footer-head">
                        навигация
                    </div>
                    <div class="footer-menu footer-menu1">
                        <a href="/o-kompanii">О компании</a>
                        <a href="/populyarnye-magaziny">Популярные магазины в США</a>
                        <a href="/otzyvy">Отзывы клиентов</a>
                        <a href="/usloviya-servisa">Помощь в работе с сервисом</a>
                        <a href="/novosti">Полезное</a>
                        <a href="/kontakty">Контакты</a>
                    </div>
                </div>

                <div class="footer-item footer-item2">
                    <div class="footer-head">полезное</div>
                    <div class="footer-menu footer-menu2">
                        <a href="/politika-konfidentsialnosti">Политика конфиденциальности</a>
                        <a href="/obshchie-usloviya">Общие условия</a>
                    </div>
                </div>

            </div>

            <div class="footer-bottom flex flex-wrap between">
                <div class="footer-social flex flex-wrap">

                    <a href="https://api.whatsapp.com/send?phone=77475155613" class="footersocial-link">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="14.1105" cy="13.962" r="13.63" fill="#D6D6D6"></circle>
                            <path
                                d="M17.7707 15.4947L17.7647 15.5446C16.3027 14.8159 16.1498 14.7189 15.9609 15.0021C15.83 15.1982 15.4483 15.643 15.3333 15.7747C15.217 15.9043 15.1013 15.9143 14.9038 15.8245C14.7044 15.7248 14.0641 15.5154 13.3062 14.8372C12.7158 14.3086 12.3195 13.6604 12.2025 13.4609C12.0077 13.1245 12.4153 13.0767 12.7862 12.3746C12.8527 12.235 12.8188 12.1253 12.7696 12.0262C12.7198 11.9265 12.3228 10.9491 12.1566 10.5595C11.9971 10.1712 11.8328 10.2204 11.7098 10.2204C11.3269 10.1872 11.047 10.1925 10.8003 10.4491C9.72724 11.6286 9.99783 12.8453 10.916 14.1391C12.7204 16.5007 13.6818 16.9355 15.4397 17.5392C15.9144 17.6901 16.3472 17.6688 16.6896 17.6196C17.0712 17.5591 17.8644 17.1403 18.03 16.6715C18.1995 16.2028 18.1995 15.8139 18.1496 15.7241C18.1004 15.6344 17.9701 15.5845 17.7707 15.4947Z"
                                fill="#222222"></path>
                            <path
                                d="M19.7747 8.27678C14.6626 3.3349 6.20231 6.91914 6.19899 13.8908C6.19899 15.2844 6.56399 16.6433 7.25943 17.8434L6.13184 21.9403L10.3437 20.8419C15.5994 23.6809 22.0857 19.9111 22.0884 13.8948C22.0884 11.7832 21.264 9.79598 19.7647 8.30271L19.7747 8.27678ZM20.76 13.8729C20.756 18.9477 15.1852 22.1171 10.7792 19.5268L10.5398 19.3845L8.04662 20.0328L8.71481 17.6094L8.5559 17.3601C5.81403 12.9953 8.96413 7.29079 14.158 7.29079C15.9225 7.29079 17.5787 7.97892 18.826 9.22553C20.0726 10.4615 20.76 12.1177 20.76 13.8729Z"
                                fill="#222222"></path>
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/oryx.usa.kz/" class="footersocial-link">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M14.3699 0.334961C6.84245 0.334961 0.740234 6.43717 0.740234 13.9646C0.740234 21.4921 6.84245 27.5943 14.3699 27.5943C21.8974 27.5943 27.9996 21.4921 27.9996 13.9646C27.9996 6.43717 21.8974 0.334961 14.3699 0.334961ZM11.3733 6.73942C12.1487 6.70413 12.3964 6.6955 14.3706 6.6955H14.3683C16.3432 6.6955 16.59 6.70413 17.3654 6.73942C18.1393 6.77486 18.6678 6.89737 19.1312 7.07714C19.6098 7.26265 20.0141 7.51102 20.4185 7.91537C20.8228 8.31942 21.0712 8.72498 21.2575 9.20308C21.4362 9.66529 21.5588 10.1935 21.5952 10.9674C21.63 11.7428 21.6391 11.9905 21.6391 13.9647C21.6391 15.9389 21.63 16.1861 21.5952 16.9615C21.5588 17.735 21.4362 18.2634 21.2575 18.7258C21.0712 19.2037 20.8228 19.6093 20.4185 20.0133C20.0146 20.4177 19.6096 20.6667 19.1317 20.8523C18.6692 21.0321 18.1403 21.1546 17.3664 21.19C16.5911 21.2253 16.3441 21.234 14.3697 21.234C12.3957 21.234 12.148 21.2253 11.3727 21.19C10.5989 21.1546 10.0706 21.0321 9.60805 20.8523C9.13025 20.6667 8.72469 20.4177 8.32079 20.0133C7.91659 19.6093 7.66823 19.2037 7.48241 18.7256C7.3028 18.2634 7.18028 17.7352 7.14469 16.9613C7.10956 16.1859 7.10077 15.9389 7.10077 13.9647C7.10077 11.9905 7.10986 11.7426 7.14454 10.9672C7.17937 10.1937 7.30204 9.66529 7.48226 9.20293C7.66853 8.72498 7.9169 8.31942 8.32125 7.91537C8.7253 7.51117 9.13086 7.2628 9.60896 7.07714C10.0712 6.89737 10.5994 6.77486 11.3733 6.73942Z"
                                  fill="#D6D6D6"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M13.7183 8.00572C13.8449 8.00553 13.9811 8.00559 14.1281 8.00565L14.3704 8.00572C16.3113 8.00572 16.5413 8.01269 17.3078 8.04752C18.0165 8.07993 18.4012 8.19836 18.6574 8.29786C18.9967 8.42961 19.2385 8.58711 19.4928 8.84153C19.7472 9.09596 19.9047 9.33826 20.0368 9.6775C20.1363 9.93343 20.2548 10.3181 20.2871 11.0268C20.3219 11.7931 20.3295 12.0233 20.3295 13.9633C20.3295 15.9033 20.3219 16.1335 20.2871 16.8998C20.2547 17.6085 20.1363 17.9932 20.0368 18.2491C19.905 18.5884 19.7472 18.8299 19.4928 19.0842C19.2384 19.3386 18.9968 19.4961 18.6574 19.6279C18.4015 19.7278 18.0165 19.8459 17.3078 19.8783C16.5415 19.9132 16.3113 19.9208 14.3704 19.9208C12.4294 19.9208 12.1993 19.9132 11.433 19.8783C10.7243 19.8456 10.3396 19.7272 10.0832 19.6277C9.74398 19.496 9.50167 19.3385 9.24725 19.084C8.99282 18.8296 8.83532 18.5879 8.70327 18.2485C8.60377 17.9926 8.48519 17.6079 8.45293 16.8992C8.4181 16.1329 8.41113 15.9027 8.41113 13.9615C8.41113 12.0203 8.4181 11.7913 8.45293 11.025C8.48534 10.3163 8.60377 9.93162 8.70327 9.67538C8.83502 9.33614 8.99282 9.09384 9.24725 8.83941C9.50167 8.58499 9.74398 8.42749 10.0832 8.29543C10.3394 8.19548 10.7243 8.07736 11.433 8.0448C12.1036 8.01451 12.3635 8.00542 13.7183 8.00391V8.00572ZM18.2507 9.21388C17.7691 9.21388 17.3784 9.60415 17.3784 10.0859C17.3784 10.5675 17.7691 10.9582 18.2507 10.9582C18.7323 10.9582 19.123 10.5675 19.123 10.0859C19.123 9.6043 18.7323 9.21358 18.2507 9.21358V9.21388ZM10.6381 13.9652C10.6381 11.9037 12.3095 10.2322 14.371 10.2321C16.4326 10.2321 18.1036 11.9036 18.1036 13.9652C18.1036 16.0268 16.4328 17.6975 14.3712 17.6975C12.3096 17.6975 10.6381 16.0268 10.6381 13.9652Z"
                                  fill="#D6D6D6"></path>
                            <path
                                d="M14.3703 11.543C15.7085 11.543 16.7934 12.6278 16.7934 13.966C16.7934 15.3042 15.7085 16.3891 14.3703 16.3891C13.032 16.3891 11.9473 15.3042 11.9473 13.966C11.9473 12.6278 13.032 11.543 14.3703 11.543Z"
                                fill="#D6D6D6"></path>
                        </svg>
                    </a>

                    <!-- ZERO.kz -->
                    <style>
                        #_zero_74492 {
                            /*margin-left: 10px;
                            border: 2px solid red;
                            border-radius: 3px;*/
                        }
                        #_zero_74492 img {
                            display: none;
                        }
                    </style>
                    <span id="_zero_74492">
  <noscript>
    <a href="http://zero.kz/?s=74492" target="_blank">
      <img src="http://c.zero.kz/z.png?u=74492" width="88" height="31" alt="ZERO.kz" />
    </a>
  </noscript>
</span>

                    <script type="text/javascript"><!--
                        var _zero_kz_ = _zero_kz_ || [];
                        _zero_kz_.push(["id", 74492]);
                        // Цвет кнопки
                        _zero_kz_.push(["type", 1]);
                        // Проверять url каждые 200 мс, при изменении перегружать код счётчика
                        // _zero_kz_.push(["url_watcher", 200]);

                        (function () {
                            var a = document.getElementsByTagName("script")[0],
                                s = document.createElement("script");
                            s.type = "text/javascript";
                            s.async = true;
                            s.src = (document.location.protocol == "https:" ? "https:" : "http:")
                                + "//c.zero.kz/z.js";
                            a.parentNode.insertBefore(s, a);
                        })(); //-->
                    </script>
                    <!-- End ZERO.kz -->
                </div>
            </div>
        </div>
    </footer>
</div>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/components/footer.blade.php ENDPATH**/ ?>