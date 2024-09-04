<div class="review-box mb-100px">
    <div class="container">

        <div class="review-wrap flex flex-wrap between">

            <div class="review-left  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s"
                 style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInLeft;">
                <div class="title review-title">
                    Отзывы клиентов
                </div>

                <div class="review-img_wrap">

                    <img src=" <?php echo e(asset('assets/images/cube1.png')); ?>" class="cube cube1" alt="cube">
                    <img src=" <?php echo e(asset('assets/images/cube2.png')); ?>" class="cube cube2" alt="cube">
                    <img src=" <?php echo e(asset('assets/images/cube3.png')); ?>" class="cube cube3" alt="cube">

                    <img src=" <?php echo e(asset('assets/images/man.png')); ?>" class="man" alt="man">

                    <img src=" <?php echo e(asset('assets/images/shadow.png')); ?>" class="shadow" alt="shadow">

                </div>
            </div>

            <div class="review  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInRight;">

                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="review-item" style="width: 100%; margin-right: 20px">
                        <img src=" <?php echo e(asset('assets/images/quote.png')); ?> " class="quote" alt="quote">
                        <div class="review-text">
                            <?php echo e($review->message); ?>

                        </div>
                        <div class="review-name">
                            <?php echo e($review->name); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





            </div>

        </div>

    </div>
</div>

<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/blocks/block5.blade.php ENDPATH**/ ?>