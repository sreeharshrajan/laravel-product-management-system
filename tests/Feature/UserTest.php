<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Enums\UserRole;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin can view users list
     */
    public function test_admin_can_view_users_list(): void
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);

        $response = $this->actingAs($admin)->get(route('admin.users.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
    }

    /**
     * Test admin can create a user
     */
    public function test_admin_can_create_user(): void
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);

        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => UserRole::USER->value,
        ];

        $response = $this->actingAs($admin)->post(route('admin.users.store'), $userData);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);
    }

    /**
     * Test admin can update a user
     */
    public function test_admin_can_update_user(): void
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);
        $user = User::factory()->create(['role' => UserRole::USER]);

        $updatedData = [
            'name' => 'Updated User Name',
            'email' => 'updated@example.com',
            'role' => UserRole::USER->value,
        ];

        $response = $this->actingAs($admin)->put(route('admin.users.update', $user), $updatedData);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated User Name',
            'email' => 'updated@example.com',
        ]);
    }

    /**
     * Test admin can delete a user
     */
    public function test_admin_can_delete_user(): void
    {
        $admin = User::factory()->create(['role' => UserRole::ADMIN]);
        $user = User::factory()->create(['role' => UserRole::USER]);

        $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $user));

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    /**
     * Test non-admin cannot access user CRUD
     */
    public function test_non_admin_cannot_access_user_crud(): void
    {
        $user = User::factory()->create(['role' => UserRole::USER]);

        $response = $this->actingAs($user)->get(route('admin.users.index'));
        $response->assertRedirect('/');

        $response = $this->actingAs($user)->post(route('admin.users.store'), []);
        $response->assertRedirect('/');
    }
}
