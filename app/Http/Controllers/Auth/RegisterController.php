<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showUserRegistrationForm()
    {
        return view('auth.register');
    }

    public function showAdminRegistrationForm()
    {
        return view('auth.register-admin');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => Str::lower(trim($request->email)),
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'phone' => ['required', 'string', 'min:10', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'institution' => ['required', 'string', 'min:5', 'max:255'],
            'position' => ['required', 'string', 'min:5', 'max:255'],
            'nip' => ['required', 'string', 'digits_between:16,18'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'nip.digits_between' => 'NIP/NIK harus terdiri dari 16 sampai 18 digit angka.',
            'phone.regex' => 'Nomor telepon hanya boleh berisi angka, spasi, tanda +, dan tanda hubung.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => Str::lower(trim($request->email)),
            'phone' => $request->phone,
            'institution' => $request->institution,
            'position' => $request->position,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('admin.dashboard.index');
    }
}
