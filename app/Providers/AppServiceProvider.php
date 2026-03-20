<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Додаємо класи для роботи з Gate та користувачем
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Створюємо правило доступу з назвою 'admin'
        Gate::define('admin', function (User $user) {
            // ТУТ ВПИШІТЬ EMAIL ВАШОГО АКАУНТУ (в лапках)
            return $user->email === 'dg0984381554@gmail.com'; 
        });
    }
}