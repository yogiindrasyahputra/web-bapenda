<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::toMailUsing(function ($notifiable, string $token) {
            $resetUrl = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Reset Kata Sandi - ' . config('app.name'))
                ->greeting('Halo ' . ($notifiable->name ?: 'Pengguna') . ',')
                ->line('Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda.')
                ->action('Atur Kata Sandi Baru', $resetUrl)
                ->line('Tautan ini berlaku selama ' . config('auth.passwords.users.expire', 60) . ' menit.')
                ->line('Jika Anda tidak meminta reset kata sandi, abaikan email ini. Kata sandi Anda tetap aman.');
        });
    }
}
