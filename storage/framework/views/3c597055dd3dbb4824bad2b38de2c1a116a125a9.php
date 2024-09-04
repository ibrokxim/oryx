<?php $__env->startSection('meta'); ?>
    <title><?php echo e($data['title']); ?></title>
    <meta name="description" content="<?php echo e($data['description']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="main" style="padding-top: 170px;">


        <div id="content" class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Отзывы</li>
                </ol>
            </nav>

            <div class="jr_component">
                <div class="jr_full">

                    <div id="system-message-container">
                    </div>

                    <div class="item-page" itemscope="" itemtype="https://schema.org/Article">
                        <div itemprop="articleBody">
                            <h1 class="title page-title"><?php echo e($data['h1']); ?></h1>

                            <div class="text mb-70px" style="max-width: 650px;"><?php echo e($data['text']); ?></div>

                            <div class="reveiwflex row">

                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                        <div class="review-item " style="margin-left: 5px; margin-right: 5px; box-sizing: border-box">
                                            <img src="/images/site/quote.png" class="quote">
                                            <div class="review-text"><?php echo e($review->message); ?></div>
                                            <div class="review-name"><?php echo e($review->name); ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <?php if(auth()->guard()->guest()): ?>
                                <br>
                                <br>
                                <br>
                                <h4 style="text-align: center">
                                    <a style="color: #e65a57" href="/login">Зарегистрируйтесь</a> и оставьте свой отзыв

                                </h4>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                                <br>
                                <br>
                                <br>
                                <p style="font-size: 25px; text-align: center">Оставьте свой отзыв</p>
                                <br>
                                <form action="/review" method="post" class="subscribe-form" novalidate="novalidate">
                                    <textarea placeholder="введите отзыв" style="padding: 23px; border: solid 2px #e65a57; border-radius: 25px; width: 100%" id="w3review" name="review" rows="4"></textarea>
                                    <br>
                                    <br>
                                    <div class="" style="display: flex; align-items: center">
                                        <?php echo csrf_field(); ?>
                                        <input id="name" style="margin-right: -134px; font-size: 22px; padding: 23px; padding-right: 60px; border-radius: 25px;" size="30" type="tel" maxlength="255" name="name" class="form-control subscribe-input required" placeholder="введите имя" required="required" aria-required="true" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
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
                            <?php endif; ?>

                        </div>


                        <meta itemprop="inLanguage" content="ru-RU">


                    </div>

                </div>
                <div class="clr"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/reviews.blade.php ENDPATH**/ ?>