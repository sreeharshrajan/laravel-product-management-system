<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class 
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-admin', function (User $user) {
            return $user->isAdmin();
        });
    }
}
