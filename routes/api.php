<?php

use hb\epay\HBepay;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetaTegController;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\SocialController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Profile\ProfileController;
use App\Http\Controllers\Api\Auth\VerificationController;
use App\Http\Controllers\Api\Profile\ProfileParcelController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('/send-email/{domain?}', [MailController::class, 'send'])->name('api.mail.send');

Route::middleware('auth:api')->group(function () {
	Route::post('logout', [AuthController::class, 'logout']);
	Route::get('/user', [AuthController::class, 'user']);
    Route::match(['get', 'post'], '/profile/settings', [ProfileController::class, 'settings']);
    Route::post('profile/nsettings', [ProfileController::class, 'nsettings']);
    Route::post('profile/recipients', [ProfileController::class, 'recipients_add']);
    //Route::post('profile/balance', [ProfileController::class, 'balance']);
    Route::post('profile/callback', [ProfileController::class, 'callback']);
    Route::post('profile/success', [ProfileController::class, 'success']);
    Route::post('profile/error', [ProfileController::class, 'error']);
    Route::get('profile/notifications', [ProfileController::class, 'notifications']);
    Route::get('profile/notification/{id}', [ProfileController::class, 'notification']);
    Route::post('profile/notifications/read', [ProfileController::class, 'notificationsr']);
    Route::get('profile/transactions', [ProfileController::class, 'transactions']);
    Route::get('profile/referal', [ProfileController::class, 'referal']);
    Route::post('profile/instead', [ProfileController::class, 'instead']);
	//Route::get('/profile/parcels', [ProfileParcelController::class, 'index']);
    Route::post('/profile/parcels', [ProfileParcelController::class, 'store']);
    Route::delete('/profile/parcels/{id}', [ProfileParcelController::class, 'delete']);
    Route::post('/profile/parcels/{id}/pay', [ProfileParcelController::class, 'pay']);
    Route::post('/profile/parcels/pay-many', [ProfileParcelController::class, 'payMany']);
    Route::post('/profile/parcels/{id}/delivery', [ProfileParcelController::class, 'delivery']);
    Route::post('/profile/parcels/delivery-many', [ProfileParcelController::class, 'deliveryMany']);
    Route::get('/profile/parcels', [ProfileParcelController::class, 'index']);

    Route::post('/parcels/{id}/pay', [TransactionController::class, 'pay']);
    Route::post('/parcels/pay-many', [TransactionController::class, 'payMany']);
    Route::get('/profile/balance', [ProfileController::class, 'userBalance']);

    Route::post('/pay', function(Request $request) {
        $invoiceId = uniqid('inv_', true); // Генерация уникального инвойс ID
        $pay_order = new HBepay();

        return $pay_order->gateway(
            "test",
            "test",
            "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
            "67e34d63-102f-4bd1-898e-370781d0074d",
            $invoiceId,
            10,
            "KZT",
            "https://example.kz/success.html",
            "https://example.kz/failure.html",
            "https://example.kz/",
            "https://example.kz/order/1123/fail",
            "RU",
            "HB payment gateway",
            "test1",
            "",
            ""
        );
    });
});



Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
	->middleware('auth:api')
    ->name('api.verification.send');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
	->middleware(['signed', 'throttle:6,1'])
    ->name('api.verification.verify');

Route::get('about', [PageController::class, 'about']);
Route::get('popular-stores', [PageController::class, 'popularStores']);
Route::get('store/{slug}', [PageController::class, 'store']);
Route::get('reviews', [PageController::class, 'reviews']);
Route::get('help', [PageController::class, 'help']);
Route::get('news', [PageController::class, 'news']);
Route::get('news/{slug}', [PageController::class, 'newsPage']);
Route::get('zapreshenye', [PageController::class, 'zapreshenye']);
Route::get('contacts', [PageController::class, 'contactsUs']);
Route::get('politika', [PageController::class, 'politika']);
Route::get('usloviya', [PageController::class, 'usloviya']);
Route::get('buy-me', [PageController::class, 'buy_me']);
Route::get('home', [PageController::class, 'schema']);

Route::post('send', [PageController::class, 'send']);
Route::post('email', [PageController::class, 'email']);
Route::post('review', [PageController::class, 'review']);
Route::get('meta-tegs/{slug}', [MetaTegController::class, 'showWithoutCategory']);
Route::get('meta-tegs/{category}/{slug}', [MetaTegController::class, 'showWithCategory']);


Route::get('/login/google', [SocialController::class, 'redirect']);
Route::get('/login/google/callback', [SocialController::class, 'callback']);


//Route::post('/create-payment', [PaymentController::class, 'pay']);
//Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
//Route::get('/payment/failure', [PaymentController::class, 'paymentFailure'])->name('payment.failure');
//Route::post('/payment/notify', [PaymentController::class, 'paymentNotify'])->name('payment.notify');
//Route::post('/pay', [PaymentController::class, 'pay']);


