<?php $__env->startSection('meta'); ?>
    <title><?php echo e($data['title']); ?></title>
    <meta name="description" content="<?php echo e($data['description']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="main" style="padding-top: 170px;">
        <div id="content" class="container">
            <div class="jr_component">
                <div class="jr_full">

                    <div id="system-message-container">
                    </div>

                    <div class="item-page" itemscope="" itemtype="https://schema.org/Article">
                        <meta itemprop="inLanguage" content="ru-RU">

                        <div itemprop="articleBody">
                            <div class="zapret">

                                <h1 class="title about-title"><?php echo e($data['h1']); ?></h1>
                                <br>
                                <div class="zapbody"><?php echo $data['text']; ?></div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="clr"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/zapreshenye.blade.php ENDPATH**/ ?>