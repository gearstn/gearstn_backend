<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
        // // the gate checks if the user is an admin or a superadmin
        // Gate::define('accessAdminpanel', function($user) {
        //     return $user->role(['superadmin', 'admin']);
        // });

        // // the gate checks if the user is a member
        // Gate::define('accessProfile', function($user) {
        //     return $user->role('member');
        // });

        $this->registerPolicies();

        $frontEndUrl = env('APP_URL');
        $this->setFrontEndUrlInResetPasswordEmail($frontEndUrl);

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', env('APP_URL').'/verfiy-email?email='.$notifiable->email);
        });

    }


    protected function setFrontEndUrlInResetPasswordEmail($frontEndUrl = '')
    {
        // update url in ResetPassword Email to frontend url
        ResetPassword::createUrlUsing(function ($user, string $token) use ($frontEndUrl) {
            return $frontEndUrl . '/password/email/reset?token=' . $token;
        });
    }


}
