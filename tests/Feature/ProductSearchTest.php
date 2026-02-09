<?php

namespace Tests\Feature;

use App\Services\SearchService;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;
use App\Models\User;
use App\Enums\UserRole;

class ProductSearchTest extends TestCase
{
    // Do NOT use RefreshDatabase as we don't have a working DB driver

    public function test_user_can_search_products()
    {
        $this->mock(SearchService::class, function ($mock) {
            $paginator = new LengthAwarePaginator([], 0, 15);
            $mock->shouldReceive('search')
                ->with('smartphone', 12, true)
                ->once()
                ->andReturn($paginator);
        });

        $user = new User();
        $user->id = 'user-id';
        $user->role = UserRole::USER;
        $this->actingAs($user);

        $response = $this->get('/products?search=smartphone');

        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_admin_can_search_products()
    {
        $this->mock(SearchService::class, function ($mock) {
            $paginator = new LengthAwarePaginator([], 0, 10);
            $mock->shouldReceive('search')
                ->with('Admin', 10)
                ->once()
                ->andReturn($paginator);
        });

        $admin = new User();
        $admin->id = 'admin-id';
        $admin->role = UserRole::ADMIN;
        $this->actingAs($admin);

        $response = $this->get('/admin/products?search=Admin');
        
        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    public function test_api_products_calls_search_service()
    {
         $this->mock(SearchService::class, function ($mock) {
            $paginator = new LengthAwarePaginator([], 0, 15);
            $mock->shouldReceive('search')
                ->with('api_query', 15)
                ->once()
                ->andReturn($paginator);
        });
        
        $user = new User();
        $user->id = 'api-user-id';
        $this->actingAs($user, 'sanctum');

        $response = $this->getJson('/api/products?search=api_query');

        $response->assertStatus(200);
    }
}
