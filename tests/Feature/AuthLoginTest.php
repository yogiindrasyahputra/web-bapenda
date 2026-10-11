<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_regular_user_redirects_to_dashboard_after_login(): void
    {
        $user = User::factory()->create([
            'email' => 'user@pajak.test',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);

        $response = $this->post('/login', [
            'email' => 'user@pajak.test',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_redirects_to_admin_dashboard_after_login(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@pajak.test',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@pajak.test',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_registration_page_is_accessible(): void
    {
        $response = $this->get('/register/admin');

        $response->assertStatus(200);
    }

    public function test_admin_can_register_and_is_redirected_to_admin_dashboard(): void
    {
        $response = $this->post('/register/admin', [
            'name' => 'Admin Baru',
            'email' => 'adminbaru@pajak.test',
            'phone' => '081234567890',
            'institution' => 'Badan Pengelolaan Keuangan Daerah',
            'position' => 'Kepala Seksi Pajak Hotel',
            'nip' => '198701012024011001',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'adminbaru@pajak.test',
            'role' => 'admin',
        ]);
    }

    public function test_admin_registration_requires_stricter_fields(): void
    {
        $response = $this->post('/register/admin', [
            'name' => 'Admin Baru',
            'email' => 'adminbaru@pajak.test',
            'phone' => '081234567890',
            'institution' => 'Badan Pengelolaan Keuangan Daerah',
            'position' => 'Kepala Seksi Pajak Hotel',
            'nip' => '198701012024011001',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertDatabaseHas('users', [
            'email' => 'adminbaru@pajak.test',
            'role' => 'admin',
        ]);
    }
}
