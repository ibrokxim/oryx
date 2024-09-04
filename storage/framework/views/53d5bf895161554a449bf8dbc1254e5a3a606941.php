<?php $__env->startSection('content'); ?>



<div class="loginwrap flex flex-wrap">
    
    <?php if(session()->get('resent')): ?>
        <div class="alert alert-success" role="alert">
            На ваш адрес электронной почты отправлена новая ссылка для подтверждения
        </div>
    <?php endif; ?>
    <?php if(session()->get('needverify')): ?>
    
        <div class="email-verif_fon"></div>
    
        <div class="email-verif">
            
            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.2273 0.971191C12.8079 0.971191 0.282227 13.497 0.282227 28.9163C0.282227 44.3355 12.8079 56.8614 28.2273 56.8614C43.6465 56.8614 56.1723 44.3355 56.1723 28.9163C56.1723 13.497 43.6465 0.971191 28.2273 0.971191ZM28.2273 3.4012C42.3332 3.4012 53.7423 14.8103 53.7423 28.9163C53.7423 43.0222 42.3332 54.4313 28.2273 54.4313C14.1212 54.4313 2.71223 43.0222 2.71223 28.9163C2.71223 14.8103 14.1212 3.4012 28.2273 3.4012ZM13.6473 16.1587C11.6279 16.1587 10.0022 17.7844 10.0022 19.8037V38.0288C10.0022 40.0481 11.6279 41.6738 13.6473 41.6738H42.8073C44.8267 41.6738 46.4523 40.0481 46.4523 38.0288V19.8037C46.4523 17.7844 44.8267 16.1587 42.8073 16.1587H13.6473ZM16.5518 21.0187C16.7329 21.0011 16.9156 21.0244 17.0865 21.0868C17.2573 21.1493 17.412 21.2493 17.539 21.3794L27.2211 30.9856C27.6668 31.4279 28.7474 31.4289 29.1955 30.9856L38.9155 21.3794C39.0281 21.2634 39.1628 21.1711 39.3115 21.1078C39.4602 21.0444 39.6201 21.0114 39.7818 21.0107C39.9435 21.0099 40.1036 21.0414 40.253 21.1033C40.4023 21.1653 40.5378 21.2564 40.6515 21.3713C40.7651 21.4863 40.8547 21.6228 40.915 21.7728C40.9753 21.9228 41.005 22.0833 41.0025 22.2449C40.9999 22.4066 40.9651 22.5661 40.9002 22.7141C40.8352 22.8622 40.7413 22.9957 40.6241 23.107L34.4921 29.163L40.5862 34.7065C40.8253 34.923 40.9687 35.2257 40.9847 35.5479C41.0007 35.8701 40.8881 36.1855 40.6716 36.4247C40.4551 36.6638 40.1524 36.8072 39.8302 36.8232C39.508 36.8392 39.1926 36.7266 38.9534 36.5101L32.7646 30.8907L30.9231 32.7132C29.4332 34.1873 27.0018 34.1909 25.5125 32.7132L23.671 30.8907L17.5011 36.5101C17.262 36.7266 16.9466 36.8392 16.6244 36.8232C16.3022 36.8072 15.9995 36.6638 15.783 36.4247C15.5665 36.1855 15.4538 35.8701 15.4699 35.5479C15.4859 35.2257 15.6292 34.923 15.8684 34.7065L21.9434 29.1821L15.8305 23.107C15.6622 22.9463 15.5436 22.7407 15.4887 22.5146C15.4339 22.2885 15.4451 22.0514 15.5211 21.8314C15.597 21.6115 15.7346 21.418 15.9173 21.2739C16.1 21.1299 16.3203 21.0413 16.5518 21.0187Z" fill="#E65A57"/>
            </svg>

            
            <div class="head">Подтверждение адреса электронной почты</div>
            <div class="login-text mb-30px">Благодарим вас за доверие нашему сервису! Чтобы завершить процесс регистрации, вам необходимо подтвердить вашу почту перейдя по сслыке в письме.</div>
            <div class="login-text">
                Если вы не получили письмо,
                <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e(session()->get('needverify')); ?>">
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">нажмите здесь, чтобы запросить другой</button>.
                </form>
            </div>
            
            <div class="email-verif_close">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.58301 1.80078L16.583 16.8008" stroke="#343434" stroke-width="3"/>
                    <path d="M16.583 1.80078L1.58301 16.8008" stroke="#343434" stroke-width="3"/>
                </svg>
            </div>
            
        </div>
        
        
        
    <?php endif; ?>
    
    
    
    <div class="loginbox">
        <div class="head login-head">
            Войти в личный кабинет
        </div>
        <div class="login-text">
            Чтобы войти введите ваш email и пароль
        </div>
         
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
          
            <input type="text" name="email" value="<?php echo e(old('email')); ?>" placeholder="Электронная почта" class="unstyled <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required />
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
 

            <input type="password" name="password" placeholder="Пароль" class="unstyled <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required />
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    
            <button type="submit" class="bt btn-orange loginform-btn">Войти в мой кабинет</button>
 
    
            <div class="loginform-link_wrap">
                <a href="<?php echo e(route('register')); ?>" class="bt btn-regist"> 
                    <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.530273" y="6.49951" width="15.4326" height="12.1599" rx="2" fill="#4F2C2C"/>
                    <rect x="7.44336" y="12.1821" width="1.52576" height="2.81483" fill="white"/>
                    <circle cx="8.24681" cy="11.5803" r="1.41868" fill="white"/>
                    <path d="M4.51074 4.33349C4.51074 2.67664 5.85389 1.3335 7.51074 1.3335H8.90039C10.5572 1.3335 11.9004 2.67664 11.9004 4.3335V6.94045H4.51074V4.33349Z" stroke="#4F2C2C" stroke-width="2"/>
                    </svg>
                    Зарегистрироваться
                </a>
                <a href="<?php echo e(route('password.request')); ?>" class="bt btn-forgot"> 
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.58057 13.4648C9.58057 12.7812 9.66357 12.2368 9.82959 11.8315C9.99561 11.4263 10.2983 11.0283 10.7378 10.6377C11.1821 10.2422 11.4775 9.92236 11.624 9.67822C11.7705 9.4292 11.8438 9.16797 11.8438 8.89453C11.8438 8.06934 11.4629 7.65674 10.7012 7.65674C10.3398 7.65674 10.0493 7.76904 9.82959 7.99365C9.61475 8.21338 9.50244 8.51855 9.49268 8.90918H7.36865C7.37842 7.97656 7.67871 7.24658 8.26953 6.71924C8.86523 6.19189 9.67578 5.92822 10.7012 5.92822C11.7363 5.92822 12.5396 6.17969 13.1108 6.68262C13.6821 7.18066 13.9678 7.88623 13.9678 8.79932C13.9678 9.21436 13.875 9.60742 13.6895 9.97852C13.5039 10.3447 13.1792 10.7524 12.7153 11.2017L12.1221 11.7656C11.751 12.1221 11.5386 12.5396 11.4849 13.0181L11.4556 13.4648H9.58057ZM9.36816 15.7134C9.36816 15.3862 9.47803 15.1177 9.69775 14.9077C9.92236 14.6929 10.208 14.5854 10.5547 14.5854C10.9014 14.5854 11.1846 14.6929 11.4043 14.9077C11.6289 15.1177 11.7412 15.3862 11.7412 15.7134C11.7412 16.0356 11.6313 16.3018 11.4116 16.5117C11.1968 16.7217 10.9111 16.8267 10.5547 16.8267C10.1982 16.8267 9.91016 16.7217 9.69043 16.5117C9.47559 16.3018 9.36816 16.0356 9.36816 15.7134Z" fill="#796969"/>
                        <circle cx="10.9426" cy="11.4963" r="9.72093" stroke="#796969" stroke-width="2"/>
                    </svg>
                    Забыли пароль
                </a>
            </div>
           
            
        </form>
         
        
    </div>
    
    <div class="loginsocial">
        <?php echo $__env->make('partials.log-in-with', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
</div>


 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app',[
    'title'=>'Авторизация',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ibrohim/Backend/php/Laravel/oryx/resources/views/auth/login.blade.php ENDPATH**/ ?>