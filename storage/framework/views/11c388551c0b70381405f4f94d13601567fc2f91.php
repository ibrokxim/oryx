<nav class="mainnav">

    <ul class="mainlist">

        <li><a href="/">главная</a></li>
        <li><a href="/o-kompanii">о КОМПАНИИ</a></li>
        <li><a href="/populyarnye-magaziny">популярные магазины в сша</a></li>
      <!--  <li><a href="/otzyvy">оТЗЫВЫ КЛИЕНТОВ</a></li> -->
        <li><a href="/usloviya-servisa">ПОМОЩЬ В РАБОТЕ С сервисом</a></li>
      <!--  <li><a href="/novosti">Полезное</a></li> -->
        <li><a href="/kontakty">Контакты</a></li>
        <li><a href="/buy-me">Купите вместо меня</a></li>

        <?php if(auth()->guard()->check()): ?>
            <li>
                <a class="register" href="/logout"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">ВЫХОД</a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
            </li>
        <?php endif; ?>

    </ul>


</nav>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/components/mainNav.blade.php ENDPATH**/ ?>