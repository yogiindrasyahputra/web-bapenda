<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
        ]);

        try {
            $status = Password::sendResetLink([
                'email' => Str::lower(trim($request->input('email'))),
            ]);
        } catch (\Throwable $exception) {
            report($exception);

            return back()
                ->withInput()
                ->withErrors(['email' => 'Email reset belum dapat dikirim. Pastikan layanan email aplikasi sedang aktif.']);
        }

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Tautan reset kata sandi sudah dikirim ke email Anda.');
        }

        if ($status === Password::RESET_THROTTLED) {
            $throttle = (int) config('auth.passwords.users.throttle', 60);

            return back()->withErrors([
                'email' => "Tautan reset baru saja dikirim. Silakan cek email Anda atau coba lagi dalam {$throttle} detik.",
            ]);
        }

        $messages = [
            Password::INVALID_USER => 'Email tersebut belum terdaftar.',
        ];

        return back()->withErrors([
            'email' => $messages[$status] ?? 'Tautan reset kata sandi belum dapat dibuat. Silakan coba lagi.',
        ]);
    }

    public function showResetForm(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
        ]);

        $status = Password::reset(
            [
                'email' => Str::lower(trim($request->input('email'))),
                'password' => $request->input('password'),
                'password_confirmation' => $request->input('password_confirmation'),
                'token' => $request->input('token'),
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => null,
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Kata sandi berhasil diubah. Silakan login kembali.')
            : back()->withErrors(['email' => __($status)]);
    }
}
