<?php $__env->startSection('content'); ?>

    
    <section id="main">
        <br>
        <br>
        <br>
        <br>
        <br>
        <img style="width: 50%; margin: auto; display: block" src="<?php echo e(asset ('/storage/icons/404.png')); ?>" alt="object not found">
        <br>
        <b><p style="font-size: 25px; text-align: center; color: #ff4330">Извините, мы не можем найти эту страницу</p></b>
        <br>
        <div class="" style="width: 200px; display: flex; align-items: center; flex-direction: column; margin: auto">
            <a class="btn btn-orange" href="/">главная</a>
        </div>
        <br>
        <br>
    </section>
    
    
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/errors/404.blade.php ENDPATH**/ ?>