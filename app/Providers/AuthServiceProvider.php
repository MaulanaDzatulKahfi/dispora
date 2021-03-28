<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
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
        VerifyEmail::toMailUsing(function (User $user, string $verificationUrl) {
            return (new MailMessage)
            ->subject(Lang::get('Verifikasi Alamat Email'))
            ->line(Lang::get('Silahkan klik tombol di bawah ini untuk memverifikasi alamat email Anda.'))
            ->action(Lang::get('Verifikasi Alamat Email'), $verificationUrl)
            ->line(Lang::get('Abaikan email ini kalau kamu tidak melakukan registrasi di website kami.'));
        });
    }
}
