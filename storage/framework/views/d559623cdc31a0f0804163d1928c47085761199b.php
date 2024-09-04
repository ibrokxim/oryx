<?php $__env->startSection('content'); ?>


<div class="loginwrap flex flex-wrap">

    <div class="loginbox">
        <div class="head login-head">
            РЕГИСТРАЦИЯ НА САЙТЕ
        </div>
        <div class="login-text">
           Пожалуйства, заполните все поля заявки
        </div>

        
         <form id="registeration" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Электронная почта" class="unstyled <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
             <span class="alert-danger" role="alert">
                 <strong>
                     <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php echo e($message); ?>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </strong>
             </span>

            <input id="password" type="password" name="password" required placeholder="Пароль" class="unstyled <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <input id="password-check" type="password" name="password_confirmation" required placeholder="Подтвердите пароль" class="unstyled" />

            <input type="tel" name="phone" id="phone1" value="" placeholder="+7 (___) ___-__-__" class="unstyled" />

             <strong id="password-len" style="display: none">
                 пароль должен быт не меньше 8 символ
                 <br>
             </strong>

            <button id="register" type="submit" class="bt btn-orange loginform-btn">Зарегистрироваться</button>

            <div class="confirm">
                <input type="checkbox" id="confirm" class="check-confirm" required />
                <label for="confirm" class="label-confirm">Я принимаю <a target="_blank" href="/politika-konfidentsialnosti">Условия и Положения</a></label>
            </div>

        </form>

    </div>

    <div class="loginsocial">
        <?php echo $__env->make('partials.log-in-with', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/imask"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var pass1 = document.querySelector('#password'),
                pass2 = document.querySelector('#password-check'),
                button = document.querySelector('#register');

            pass1.addEventListener('input', function () {
                this.value != pass2.value || this.value.length < 8 ? setDisabe(pass2, this.value) : unsetDisabe();
            });

            pass2.addEventListener('input', function () {
                this.value != pass1.value || this.value.length < 8 ? setDisabe(pass1, this.value) : unsetDisabe();
            });

            function setDisabe(pass, value) {
                button.disabled = true;
                pass.style.border = '1px solid red';

                if(value.length < 8) {
                    document.getElementById('password-len').style.display = 'block'
                } else {
                    document.getElementById('password-len').style.display = 'none'
                }
            }

            function unsetDisabe() {
                button.disabled = false;
                pass1.style.border = 'none';
                pass2.style.border = 'none';
            }
        })

        var element = document.getElementById('phone1');
        var maskOptions = {
            mask: '+{7}(000)000-00-00',
            lazy: false
        }
        var mask = new IMask(element, maskOptions);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Регистрация',
    'breadcrumbs'=>[
        route('register')=>'Регистрация'
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/auth/register.blade.php ENDPATH**/ ?>