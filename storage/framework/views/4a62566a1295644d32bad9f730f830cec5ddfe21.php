<?php $__env->startSection('meta'); ?>
    <title><?php echo e($data['title']); ?></title>
    <meta name="description" content="<?php echo e($data['description']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="container">
        <div style="margin-top: 150px">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item"><a href="/populyarnye-magaziny">Популярные</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($store->name); ?></li>
                </ol>
            </nav>
            <h1><?php echo e($data['h1']); ?></h1>

            <br>
            <br>
            <br>

            <div>
                <div id="lightbox"></div>
            </div>
            <img class="zoomD" width="350px" src="/storage/<?php echo e($store->img); ?>" alt="<?php echo e($store->alt); ?>" title="<?php echo e($store->title); ?>">
            <br>
            <br>

            <?php echo $store->short_desc; ?>


            <br><br>


            <div>
                <a href="<?php echo e($store->link); ?>" title="<?php echo e($store->title); ?>">
                    <button class="btn btn-red">перейти на Сайт</button>
                </a>
            </div>

            <br>
            <br>
            <br>

            <?php echo $store->description; ?>


            <br>
            <br>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

    <style>
        /* (A) LIGHTBOX BACKGROUND */
        #lightbox {
            position: fixed; z-index: 999;
            top: 0; left: 0;
            width: 100vw; height: 100vh;

            /* (A2) BACKGROUND */
            background: rgba(0, 0, 0, 0.5);

            /* (A3) CENTER IMAGE ON SCREEN */
            display: flex;
            align-items: center;

            /* (A4) HIDDEN BY DEFAULT */
            visibility: hidden;
            opacity: 0;

            /* (A5) SHOW/HIDE ANIMATION */
            transition: opacity ease 0.4s;
        }

        /* (A6) TOGGLE VISIBILITY */
        #lightbox.show {
            visibility: visible;
            opacity: 1;
        }

        #lightbox img {
            width: fit-content;
            height: 100vh;
            object-fit: fill;
            object-position: center center;
            margin: auto;
        }

        .zoomD {
            cursor: pointer;
        }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        window.onload = () => {
            // (A) GET LIGHTBOX & ALL .ZOOMD IMAGES
            let all = document.getElementsByClassName("zoomD"),
                lightbox = document.getElementById("lightbox");

            // (B) CLICK TO SHOW IMAGE IN LIGHTBOX
            // * SIMPLY CLONE INTO LIGHTBOX & SHOW
            if (all.length>0) { for (let i of all) {
                i.onclick = () => {
                    let clone = i.cloneNode();
                    clone.className = "";
                    lightbox.innerHTML = "";
                    lightbox.appendChild(clone);
                    lightbox.className = "show";
                };
            }}

            // (C) CLICK TO CLOSE LIGHTBOX
            lightbox.onclick = () => lightbox.className = "";
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/oryx.kz/cms.oryx.kz/resources/views/pages/product.blade.php ENDPATH**/ ?>