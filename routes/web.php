<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PartController;
// Підключаємо новий контролер для адмінки і даємо йому псевдонім, щоб не було конфлікту імен
use App\Http\Controllers\Admin\PartController as AdminPartController; 

// Головна сторінка
Route::get('/', [MainController::class, 'index'])->name('home');

// Сторінка "Про проєкт"
Route::get('/about', [MainController::class, 'about'])->name('about');

// Каталог запчастин (список)
Route::get('/parts', [PartController::class, 'index'])->name('parts.index');

// Сторінка конкретної запчастини (по ID)
Route::get('/parts/{id}', [PartController::class, 'show'])->name('parts.show');

// Сторінка оформлення замовлення
Route::get('/parts/{id}/checkout', [PartController::class, 'checkout'])->name('parts.checkout');

// Обробка відправленої форми замовлення
Route::post('/parts/{id}/checkout', [PartController::class, 'processCheckout'])->name('parts.processCheckout');

// ==========================================
// АДМІНІСТРАТИВНА ЧАСТИНА (Крок 3)
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Route::resource автоматично створює всі маршрути для CRUD:
    // admin.parts.index, admin.parts.show, admin.parts.destroy тощо
    Route::resource('parts', AdminPartController::class);
});

// ==========================================
// ТИМЧАСОВИЙ МАРШРУТ ДЛЯ ДОДАВАННЯ ДАНИХ
// ==========================================
Route::get('/add-test-data', function () {
    \App\Models\Part::create(['name' => 'Фільтр масляний', 'car' => 'Toyota Camry', 'price' => 150.00]);
    \App\Models\Part::create(['name' => 'Ремінь ГРМ', 'car' => 'Volkswagen Passat', 'price' => 627.50]);
    \App\Models\Part::create(['name' => 'Масло моторне 5W-30', 'car' => 'Universal', 'price' => 900.00]);
    \App\Models\Part::create(['name' => 'Гальмівні колодки', 'car' => 'Honda Accord', 'price' => 450.00]);
    
    return 'Супер! Всі дані успішно додано в базу. Тепер відкрийте сторінку http://127.0.0.1:8000/admin/parts';
});