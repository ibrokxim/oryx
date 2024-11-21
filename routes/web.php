<?php

use App\Http\Controllers\Admin\TransactionController;
use hb\epay\HBepay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReferalController;
use App\Http\Controllers\Admin\IndController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ParcelController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\InsteadController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Admin\RecipientController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Profile\ProfileParcelController;
use App\Http\Controllers\Admin\AdditionalFunctionsController;

Route::get('profile/dev-auth/{user}', function (User $user) {
    Auth::login($user);
    return redirect()->route('profile.parcels');
});

Route::match(['get', 'post'], '/populyarnye-magaziny', [PageController::class, 'popularStores']);
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/politika-konfidentsialnosti', [PageController::class, 'politika']);
Route::get('/populyarnye-magaziny/{slug}', [PageController::class, 'store']);
Route::get('/zapreshenye-tovary', [PageController::class, 'zapreshenye']);
Route::get('/obshchie-usloviya', [PageController::class, 'usloviya']);
Route::get('/novosti/{slug}', [PageController::class, 'newsPage']);
Route::get('/usloviya-servisa', [PageController::class, 'help']);
Route::get('/kontakty', [PageController::class, 'contactsUs']);
Route::get('/o-kompanii', [PageController::class, 'about']);
Route::get('/otzyvy', [PageController::class, 'reviews']);
Route::get('/buy-me', [PageController::class, 'buy_me']);
Route::get('/novosti', [PageController::class, 'news']);

Route::match(['GET', 'POST'], '/referal-register/{user}', [ReferalController::class, 'referal_register']);

Route::post('/review', [PageController::class, 'review']);
Route::post('/email', [PageController::class, 'email']);
Route::post('/buy', [PageController::class, 'send']);


Route::get('email/notif', [App\Http\Controllers\IndexController::class, 'notif'])->name('verification.notif');

Route::get('/login/{provider}', [App\Http\Controllers\Auth\SocialController::class, 'getSocialAuth'])->name('getSocialAuth');

Route::get('/login/callback/{provider}', [App\Http\Controllers\Auth\SocialController::class, 'getSocialAuthCallback'])->name('getSocialAuthCallback');

Auth::routes(['verify' => true]);

Route::match(['GET', 'POST'], '/register/confirm', [App\Http\Controllers\IndexController::class, 'confirm'])->name('register.confirm');
Route::get('/register/completed', [App\Http\Controllers\IndexController::class, 'completed'])->name('register.completed');
Route::get('/panel/login', [App\Http\Controllers\IndexController::class, 'login'])->name('admin.login');

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/profile/success', [ProfileController::class, 'success'])->name('profile.success');
Route::get('/profile/callback', [ProfileController::class, 'callback'])->name('profile.callback');
Route::get('/profile/error', [ProfileController::class, 'error'])->name('profile.error');

Route::group(['prefix' => 'profile', 'middleware' => ['auth', 'check.fio.user']], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::match(['GET', 'POST'], '/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::match(['GET', 'POST'], '/nsettings', [ProfileController::class, 'nsettings'])->name('profile.nsettings');
    Route::post('/recipients/add', [ProfileController::class, 'recipients_add'])->name('profile.recipients.add');
    Route::post('/instead', [ProfileController::class, 'instead'])->name('profile.instead');
    Route::match(['GET', 'POST'], '/balance', [ProfileController::class, 'balance'])->name('profile.balance');

    Route::get('/notifications', [ProfileController::class, 'notifications'])->name('profile.notifications');
    Route::get('/notifications/{id}', [ProfileController::class, 'notification'])->name('profile.notification');
    Route::get('/notificationsr', [ProfileController::class, 'notificationsr'])->name('profile.notificationsr');
    Route::get('/transactions', [ProfileController::class, 'transactions'])->name('profile.transactions');
    Route::get('/referal', [ProfileController::class, 'referal'])->name('profile.referal');

    Route::post('/parcels/delete/{id}', [ProfileParcelController::class, 'delete'])->name('profile.parcels.delete');
    Route::get('/parcels/pay/{id}', [ProfileParcelController::class, 'pay'])->name('profile.parcels.pay');
    Route::get('/parcels/pay-many', [ProfileParcelController::class, 'payMany'])->name('profile.parcels.payMany');
    Route::post('/parcels/delivery/{id}', [ProfileParcelController::class, 'delivery'])->name('profile.parcels.delivery');
    Route::post('/parcels/delivery-many', [ProfileParcelController::class, 'deliveryMany'])->name('profile.parcels.deliveryMany');

    Route::resource('parcels', ProfileParcelController::class)->names([
        'index' => 'profile.parcels',
        'create' => 'profile.parcels.create',
        'store' => 'profile.parcels.store',
        //'delete' => 'profile.parcels.delete',
    ]);

    Route::view('/addresses', 'profile.addresses')->name('profile.addresses');
    Route::view('/addresses_eu', 'profile.addresses_eu')->name('profile.addresses_eu');
});

Route::group(['prefix' => 'panel', 'middleware' => ['auth']], function () {
    Route::get('/', [IndexController::class, 'index'])->name('admin.index');
    Route::get('/cashback', [IndexController::class, 'cashback'])->name('admin.cashback');

    Route::resource('admins', AdminController::class);
    Route::post('admins/delete', [AdminController::class, 'delete'])->name('admins.delete');

    Route::resource('users', UserController::class);
    Route::post('users/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('users/referal/{id}', [UserController::class, 'referal'])->name('users.referal');
    Route::get('users/load/{id}/{start}/{stop}', [UserController::class, 'load'])->name('users.load');
    // Дополнительные услуги
    Route::get('additional-functions', [AdditionalFunctionsController::class, 'showAllAdditionalFunctions'])->name('additional-functions.index');
    Route::get('additional-functions/create', [AdditionalFunctionsController::class, 'createAdditionalFunctions'])->name('additional-functions.create');
    Route::post('additional-functions/store', [AdditionalFunctionsController::class, 'storeAdditionalFunction'])->name('additional-functions.store');
    Route::get('additional-functions/edit/{id}', [AdditionalFunctionsController::class, 'editAdditionalFunction'])->name('additional-functions.edit');
    Route::put('additional-functions/update{id}', [AdditionalFunctionsController::class, 'updateAdditionalFunction'])->name('additional-functions.update');
    Route::delete('additional-functions/delete/{id}', [AdditionalFunctionsController::class, 'deleteAdditionalFunction'])->name('additional-functions.delete');

    Route::post('recipients/error/{id}', [RecipientController::class, 'error'])->name('recipients.error');
    Route::resource('recipients', RecipientController::class);
    //файлы получателя
    Route::get('/recipient/file/{id}/{file}', [RecipientController::class, 'file']);
    Route::post('recipients/delete', [RecipientController::class, 'delete'])->name('recipients.delete');

    Route::resource('instead', InsteadController::class);
    Route::post('instead/delete', [InsteadController::class, 'delete'])->name('instead.delete');

    Route::resource('notifications', NotificationController::class);
    Route::post('notifications/delete', [NotificationController::class, 'delete'])->name('notifications.delete');

    Route::resource('settings', SettingController::class);
    Route::post('settings/delete', [SettingController::class, 'delete'])->name('settings.delete');

    Route::get('parcels/excel/{id}', [ParcelController::class, 'excel'])->name('parcels.excel');
    Route::get('parcels/replace/{id}', [ParcelController::class, 'replace'])->name('parcels.replace');
    Route::post('parcels/replaces/{id}', [ParcelController::class, 'replaces'])->name('parcels.replaces');
    Route::resource('parcels', ParcelController::class);
    Route::post('parcels/delete', [ParcelController::class, 'delete'])->name('parcels.delete');
    Route::post('parcels/upload', [ParcelController::class, 'upload'])->name('parcels.upload');
    Route::get('parcels/load/{status}', [ParcelController::class, 'load'])->name('parcels.load');
	Route::post('parcels/change-status/{status}', [ParcelController::class, 'changeStatus'])->name('parcels.change-status');

    Route::get('finance', [IndController::class, 'finance'])->name('finance.index');
    Route::get('transactions', [TransactionController::class, 'transactions'])->name('transactions.index');
    Route::get('ind/load', [IndController::class, 'load'])->name('ind.load');
    Route::resource('ind', IndController::class);

    Route::any( '/roles', [RoleController::class, 'index'] )->name('roles.index');

    Route::get('ajax/recipient', [AjaxController::class, 'recipient'])->name('ajax.recipient');
    Route::get('ajax/user', [AjaxController::class, 'user'])->name('ajax.user');
});

Route::get('/pay',function(Request $request){
    $pay_order = new HBepay();

    return $pay_order->gateway(
        "test",
        "test",
        "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
        "67e34d63-102f-4bd1-898e-370781d0074d",
        null,
        $request->input('amount'),
        "KZT",
        "https://example.kz/success.html",
"https://example.kz/failure.html",
        "https://example.kz/",
"https://example.kz/order/1123/fail",
        "RU",
        "HB payment gateway",
        "test1",
        "",
        "");
});
