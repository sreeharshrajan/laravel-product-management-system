<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Enums\UserRole;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_products()
    {
        $user = User::factory()->create();
        Product::factory()->count(3)->create();

        $response = $this->actingAs($user)->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function test_admin_can_create_product()
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);

        $response = $this->actingAs($admin)->postJson('/api/admin/products', [
            'title' => 'New Product',
            'description' => 'Description',
            'price' => 99.99,
            'date_available' => now()->toDateString(),
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', ['title' => 'New Product']);
    }

    public function test_standard_user_cannot_create_product()
    {
        $user = User::factory()->create(['role' => UserRole::USER]);

        $response = $this->actingAs($user)->postJson('/api/admin/products', [
            'title' => 'New Product',
            'description' => 'Description',
            'price' => 99.99,
            'date_available' => now()->toDateString(),
        ]);

        $response->assertStatus(403);
    }

    public function test_search_products()
    {
        $user = User::factory()->create();
        Product::factory()->create(['title' => 'UniqueiPhone']);
        Product::factory()->create(['title' => 'SamsungGalaxy']);

        $response = $this->actingAs($user)->getJson('/api/products?search=UniqueiPhone');

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonFragment(['title' => 'UniqueiPhone']);
    }
}
