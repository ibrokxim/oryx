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
                    <li class="breadcrumb-item active" aria-current="page">Полезное</li>
                </ol>
            </nav>

            <div class="jr_component">
                <div class="jr_full">

                    <div id="system-message-container">
                    </div>

                    <div class="blog  flex flex-wrap flex-row mb-100px" itemscope="" itemtype="https://schema.org/Blog">

                        <div class="category-desc clearfix">

                            <h1 class="title about-title"><?php echo e($data['h1']); ?></h1>

                            <div class="text pl-15px mb-70px"><?php echo e($data['text']); ?></div>
                        </div>

                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="items-row cols-1 row-0 row-fluid clearfix">
                                <div class="span12">
                                    <div class="item column-1" itemprop="blogPost" itemscope="" itemtype="https://schema.org/BlogPosting">

                                        <dl class="article-info muted">

                                            <dt class="article-info-term">
                                            </dt>

                                            <dd class="published">
                                                <span class="icon-calendar" aria-hidden="true"></span>
                                                <time datetime="2021-10-21T09:08:16+00:00" itemprop="datePublished">
                                                    <span class="date-day"><?php echo e($new->day); ?></span><span class="datefull"><?php echo e($new->date); ?></span>
                                                </time>
                                            </dd>
                                        </dl>


                                        <div class="page-header">
                                            <div class="blog-title">
                                                <a href="/novosti/<?php echo e($new->slug); ?>" itemprop="url"><?php echo e($new->short_desk); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
                <div class="clr"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/news.blade.php ENDPATH**/ ?>