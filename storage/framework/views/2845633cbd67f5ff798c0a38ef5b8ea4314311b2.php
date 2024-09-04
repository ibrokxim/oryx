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
                    <li class="breadcrumb-item"><a href="/novosti">Полезное</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($new->name); ?></li>
                </ol>
            </nav>

            <div class="jr_component">
                <div class="jr_full">

                    <div id="system-message-container">
                    </div>

                    <div class="blog  flex flex-wrap flex-row mb-100px" itemscope="" itemtype="https://schema.org/Blog">

                        <div class="category-desc clearfix">
                            <h1 class="title about-title"><?php echo e($data['h1']); ?></h1>
                            <div class="text pl-15px mb-70px"><?php echo $data['text']; ?></div>
                        </div>

                    </div>

                </div>
                <div class="clr"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/news-page.blade.php ENDPATH**/ ?>