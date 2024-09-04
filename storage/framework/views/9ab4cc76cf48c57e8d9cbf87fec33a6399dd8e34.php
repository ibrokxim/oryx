<div class="faq-wrap mb-100px  wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s"
     style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.1s; animation-name: fadeInUp;">

    <div class="container">

        <div class="title faq-title">
            Популярные вопросы
        </div>

        <div class="faq">


            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qusetion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="faq-item">
                    <div class="faq-head">
                        <?php echo e($qusetion->question); ?><span></span>
                    </div>
                    <div class="faq-content">
                        <?php echo $qusetion->response; ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>

</div>
<?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/blocks/block6.blade.php ENDPATH**/ ?>