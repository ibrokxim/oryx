<?php

namespace App\Providers;

use App\Models\Setting;
use App\Policies\RolePolicy;
use Laravel\Passport\Passport;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
		Passport::routes();
        $mail = Setting::where([['active',1],['type',0],['code','registration']])->first();

        if ($mail) {
            VerifyEmail::toMailUsing(function ($notifiable, $url) use ($mail) {
                return (new MailMessage)
                    ->subject($mail->name)
                    ->line($mail->value)
                    ->action('Подтвердить', $url);
            });
        }
    }
}
