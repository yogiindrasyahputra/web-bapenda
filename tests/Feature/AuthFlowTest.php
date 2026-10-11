<?php

namespace Tests\Feature;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_non_admin_user_cannot_create_hotel(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get(route('hotel.create'))
            ->assertForbidden();

        $this->actingAs($user)
            ->post(route('hotel.store'), [
                'nama' => 'Hotel Ilegal',
                'alamat' => 'Jl. Tidak Boleh',
                'status' => 'aktif',
            ])
            ->assertForbidden();
    }

    public function test_peta_page_shows_hotels_with_coordinates_even_when_nonaktif(): void
    {
        Hotel::create([
            'nama' => 'Hotel Nonaktif Test',
            'alamat' => 'Jl. Test No. 1',
            'lat' => -0.7893,
            'lng' => 100.6543,
            'status' => 'nonaktif',
        ]);

        $response = $this->get('/peta');

        $response->assertOk()->assertSee('Hotel Nonaktif Test');
    }

    public function test_hotel_index_returns_30_items_per_page(): void
    {
        for ($i = 1; $i <= 35; $i++) {
            Hotel::create([
                'nama' => "Hotel Test {$i}",
                'alamat' => "Alamat {$i}",
                'lat' => -0.7893 + $i,
                'lng' => 100.6543 + $i,
                'status' => $i % 2 === 0 ? 'aktif' : 'nonaktif',
            ]);
        }

        $response = $this->get('/hotel');

        $response->assertOk();
        $this->assertCount(30, $response->viewData('hotels')->items());
    }

    public function test_login_page_includes_standard_login(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
            ->assertSee('Login')
            ->assertSee('Lupa Kata Sandi?')
            ->assertDontSee('social.login');
    }

    public function test_registration_page_is_accessible(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_register_and_access_dashboard(): void
    {
        $response = $this->post('/register', [
            'name' => 'Operator Baru',
            'email' => 'operator@pajak.test',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('users', [
            'email' => 'operator@pajak.test',
        ]);
        $this->assertAuthenticated();
    }

    public function test_registered_user_can_logout_and_login_again(): void
    {
        $this->post('/register', [
            'name' => 'Pengguna Baru',
            'email' => ' Pengguna@Pajak.test ',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/dashboard');

        $registeredUser = User::where('email', 'pengguna@pajak.test')->firstOrFail();
        $this->assertTrue(Hash::check('password123', $registeredUser->password));

        $this->post('/logout')->assertRedirect('/login');
        $this->assertGuest();

        $this->post('/login', [
            'email' => 'pengguna@pajak.test',
            'password' => 'password123',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticated();
    }

    public function test_user_can_logout_and_redirect_to_login(): void
    {
        $user = \App\Models\User::factory()->create();

        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect('/login');

        $this->assertGuest();
    }

    public function test_authenticated_user_can_view_account_settings(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('account.edit'))
            ->assertOk()
            ->assertSee('Pengaturan Akun')
            ->assertSee('Informasi Profil')
            ->assertSee('Keamanan');
    }

    public function test_user_can_update_profile_information(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('account.profile.update'), [
                'name' => 'Operator Utama',
                'email' => 'operator.utama@pajak.test',
            ])
            ->assertRedirect()
            ->assertSessionHas('profile_status', 'Informasi akun berhasil diperbarui.');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Operator Utama',
            'email' => 'operator.utama@pajak.test',
        ]);
    }

    public function test_user_can_upload_a_profile_photo(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $photo = UploadedFile::fake()->image('avatar.png');

        $this->actingAs($user)
            ->post(route('account.profile.update'), [
                'name' => $user->name,
                'email' => $user->email,
                'profile_photo' => $photo,
            ])
            ->assertRedirect()
            ->assertSessionHas('profile_status', 'Informasi akun berhasil diperbarui.');

        $photoPath = $user->fresh()->profile_photo_path;

        $this->assertNotNull($photoPath);
        Storage::disk('public')->assertExists($photoPath);
    }

    public function test_user_can_update_password_with_current_password(): void
    {
        $user = User::factory()->create(['password' => Hash::make('password-lama')]);

        $this->actingAs($user)
            ->put(route('account.password.update'), [
                'current_password' => 'password-lama',
                'password' => 'password-baru',
                'password_confirmation' => 'password-baru',
            ])
            ->assertRedirect()
            ->assertSessionHas('password_status', 'Kata sandi berhasil diperbarui.');

        $this->assertTrue(Hash::check('password-baru', $user->fresh()->password));
    }

    public function test_user_can_request_a_password_reset_link(): void
    {
        Notification::fake();
        $user = User::factory()->create(['email' => 'operator@pajak.test']);

        $response = $this->post(route('password.email'), [
            'email' => $user->email,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('status', 'Tautan reset kata sandi sudah dikirim ke email Anda.');
        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_repeated_password_reset_request_explains_throttle_in_indonesian(): void
    {
        Notification::fake();
        $user = User::factory()->create(['email' => 'operator@pajak.test']);

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertSessionHas('status');

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertSessionHasErrors([
                'email' => 'Tautan reset baru saja dikirim. Silakan cek email Anda atau coba lagi dalam 60 detik.',
            ]);
    }

    public function test_user_can_reset_password_from_a_valid_token(): void
    {
        Notification::fake();
        $user = User::factory()->create([
            'email' => 'operator@pajak.test',
            'password' => 'password-lama',
        ]);
        Password::sendResetLink(['email' => $user->email]);
        $token = null;

        Notification::assertSentTo($user, ResetPassword::class, function (ResetPassword $notification) use (&$token): bool {
            $token = $notification->token;

            return true;
        });

        $this->get(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ]))->assertOk()->assertSee('Buat Kata Sandi Baru');

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'password-baru',
            'password_confirmation' => 'password-baru',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('status', 'Kata sandi berhasil diubah. Silakan login kembali.');
        $this->assertTrue(password_verify('password-baru', $user->fresh()->password));
    }
}
