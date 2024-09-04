<?php $__env->startSection('meta'); ?>
    <title><?php echo e($data['title']); ?></title>
    <meta name="description" content="<?php echo e($data['description']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="main" style="padding-top: 170px;">
        <div id="content" class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ПОЛИТИКА</li>
                </ol>
            </nav>

            <div class="jr_component">
                <div class="jr_full">

                    <div id="system-message-container">
                    </div>

                    <div class="item-page" itemscope="" itemtype="https://schema.org/Article">
                        <meta itemprop="inLanguage" content="ru-RU">
                        <div itemprop="articleBody">
                            <div class="confi">
                                <h1 class="title about-title"><?php echo e($data['h1']); ?></h1>
                                <div class=""><?php echo $data['text']; ?></div>
                                <?php $__currentLoopData = $rekvisit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($item->title); ?> <?php echo e($item->txt); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="clr"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/politika.blade.php ENDPATH**/ ?>