<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function (User $user, string $verificationUrl) {
            return (new MailMessage)
                ->subject(Lang::get('Kinnita eposti aadress'))
                ->line(Lang::get('Palun vajuta Kinnita nuppu, et kinnitada oma eposti aadress.'))
                ->action(Lang::get('Kinnita eposti aadress'), $verificationUrl)
                ->line(Lang::get('Kui te kontot ei loonud, pole edasine tegevus vajalik.'));
        });
        $this->registerPolicies();

        //
    }
}
