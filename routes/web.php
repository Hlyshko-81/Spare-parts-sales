<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\Admin\PartController as AdminPartController;

// Головна сторінка
Route::get('/', [MainController::class, 'index'])->name('home');

// Сторінка "Про проєкт"
Route::get('/about', [MainController::class, 'about'])->name('about');

// Каталог запчастин
Route::get('/parts', [PartController::class, 'index'])->name('parts.index');
Route::get('/parts/{id}', [PartController::class, 'show'])->name('parts.show');
Route::get('/parts/{id}/checkout', [PartController::class, 'checkout'])->name('parts.checkout');
Route::post('/parts/{id}/checkout', [PartController::class, 'processCheckout'])->name('parts.processCheckout');

// ==========================================
// АДМІНІСТРАТИВНА ЧАСТИНА (ЗАКРИТА ПАРОЛЕМ І ПРАВАМИ)
// ==========================================
// ТУТ БУЛА ПОМИЛКА: додаємо 'can:admin' до middleware!
Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:admin'])->group(function () {
    Route::resource('parts', AdminPartController::class);
});

// ==========================================
// МАРШРУТ ПІСЛЯ ВХОДУ 
// ==========================================
Route::get('/dashboard', function () {
    // ТУТ БУЛА ПОМИЛКА: вписав 'home', щоб перекидало на головну сторінку
    return redirect()->route('home'); 
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================================
// ТИМЧАСОВИЙ МАРШРУТ ДЛЯ ЗАПОВНЕННЯ БАЗИ
// ==========================================
Route::get('/add-test-data', function () {
    \App\Models\Part::create(['name' => 'Фільтр масляний', 'car' => 'Toyota Camry', 'price' => 150.00]);
    \App\Models\Part::create(['name' => 'Ремінь ГРМ', 'car' => 'Volkswagen Passat', 'price' => 627.50]);
    \App\Models\Part::create(['name' => 'Масло моторне 5W-30', 'car' => 'Universal', 'price' => 900.00]);
    \App\Models\Part::create(['name' => 'Гальмівні колодки', 'car' => 'Honda Accord', 'price' => 450.00]);
    
    return 'Супер! Всі дані успішно додано в базу. Відкрийте головну сторінку сайту.';
});

require __DIR__.'/auth.php';