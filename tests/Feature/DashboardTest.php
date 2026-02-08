<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_displays_stats()
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);
        
        // Create some data
        User::factory()->count(2)->create(); // +1 admin = 3 users
        Product::factory()->count(5)->create();

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Total Users');
        $response->assertSee('3'); 
        $response->assertSee('Total Products');
        $response->assertSee('5');
    }

    public function test_user_dashboard_displays_only_welcome()
    {
        $user = User::factory()->create(['role' => UserRole::USER]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Welcome, ' . $user->name);
        $response->assertDontSee('My Products');
        $response->assertDontSee('Notifications');
        $response->assertDontSee('Help & Support');
    }
}
