<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'login_as' => ['nullable', 'in:user,admin'],
        ]);

        $credentials = [
            'email' => Str::lower(trim($request->input('email'))),
            'password' => $request->input('password'),
        ];

        $user = User::where('email', $credentials['email'])->first();
        $loginAs = $request->input('login_as');

        if ($loginAs === null && $user) {
            $loginAs = $user->role;
        } else {
            $loginAs = $request->input('login_as', 'user');
        }

        if ($user && $user->role !== $loginAs) {
            return back()->withErrors([
                'email' => $loginAs === 'admin'
                    ? 'Akun ini bukan akun admin.'
                    : 'Akun ini hanya bisa masuk sebagai admin.',
            ])->onlyInput('email');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $authUser = Auth::user();

            if ($authUser && $authUser->role === 'admin') {
                return redirect()->route('admin.dashboard.index');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
