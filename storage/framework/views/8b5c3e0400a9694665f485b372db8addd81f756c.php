<?php $__env->startSection('meta'); ?>
    <title><?php echo e($data['title']); ?></title>
    <meta name="description" content="<?php echo e($data['description']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="main" style="padding-top: 170px;">

        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Популярные</li>
                </ol>
            </nav>

            <div class="moduletable">
                <div class="custom">
                    <h1><?php echo e($data['h1']); ?></h1>
                    <br>
                    <div class="text mb-50px" style="max-width: 650px;"><?php echo e($data['subtitle']); ?></div>
                </div>
            </div>

        </div>

        <div id="content" class="container">
            <div class="jr_component">
                <div class="jr_left">
                    <div class="moduletable">
                        <script type="text/javascript">
                            function modFilterclearPriceFilter() {
                                var $form = jQuery('.jshop_filters form[name=jshop_filters]');
                                if ($form.length) {
                                    $form.find('input[type=text]').val('');
                                    $form.find('input[type=checkbox]').prop('checked', false);
                                    document.jshop_filters.submit();
                                }
                            }
                        </script>
                        <div class="jshop_filters">
                            <form action="/populyarnye-magaziny" method="post" name="jshop_filters">


                                <div class="filter_characteristic">

                                    <div class="filter-name">Категории</div>
                                    <?php echo csrf_field(); ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="filgroup">
                                            <input type="checkbox" name="extra_fields[]" value="<?php echo e($category->id); ?>" onclick="document.jshop_filters.submit();"
                                                <?php echo e(in_array($category->id, $selects) ? 'checked' : ''); ?>>
                                            <p class="filval"><?php echo e($category->name); ?></p>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="jr_middle">

                    <div id="system-message-container">
                    </div>

                    <div class="jshop" id="comjshop">
                        <div class="jshop_list_product">
                            <div class="row" id="comjshop_list_product">

                                <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="shopitem col-lg-4 col-xl-3 col-md-4 col-sm-6 col-">

                                        <div class="shopname">
                                            <div>
                                                <?php echo e($store->name); ?>

                                            </div>
                                        </div>

                                        <div class="image">

                                            <a href="/populyarnye-magaziny/<?php echo e($store->slug); ?>">
                                                <img class="jshop_img" src="storage/<?php echo e($store->img); ?>" alt="<?php echo e($store->alt); ?>" title="<?php echo e($store->title); ?>">
                                            </a>

                                        </div>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <?php echo e($stores->links()); ?>

                            <br>
                            <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="shopseo flex flex-wrap mb-100px">

            <div class="title shopseo-title">
                Что чаще всего покупают в США?
            </div>

            <div class="text shopseo-item"><?php echo e($data['text']); ?></div>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/popularStores.blade.php ENDPATH**/ ?>