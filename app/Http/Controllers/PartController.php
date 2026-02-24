<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartController extends Controller
{
    // Статичний масив даних (імітація БД)
    private $parts = [
        1 => ['id' => 1, 'name' => 'Фільтр масляний', 'price' => 150.00, 'car' => 'Toyota Camry'],
        2 => ['id' => 2, 'name' => 'Ремінь ГРМ', 'price' => 627.50, 'car' => 'Volkswagen Passat'],
        3 => ['id' => 3, 'name' => 'Масло моторне 5W-30', 'price' => 900.00, 'car' => 'Universal'],
        4 => ['id' => 4, 'name' => 'Гальмівні колодки', 'price' => 450.00, 'car' => 'Honda Accord'],
    ];

    // Виведення списку всіх запчастин через Blade-шаблон
    public function index()
    {
        // Передаємо масив $parts у шаблон resources/views/parts/index.blade.php
        return view('parts.index', ['parts' => $this->parts]);
    }

    // Виведення однієї запчастини за ID через Blade-шаблон
    public function show($id)
    {
        if (isset($this->parts[$id])) {
            $part = $this->parts[$id];
            
            // Передаємо масив з конкретною деталлю у шаблон resources/views/parts/show.blade.php
            return view('parts.show', ['part' => $part]);
        } else {
            abort(404, 'Запчастину не знайдено');
        }
    }
    // Відображення форми замовлення
    public function checkout($id)
    {
        if (isset($this->parts[$id])) {
            return view('parts.checkout', ['part' => $this->parts[$id]]);
        } else {
            abort(404, 'Запчастину не знайдено');
        }
    }

    // Обробка даних форми
    public function processCheckout(Request $request, $id)
    {
        // Оскільки у нас поки немає реальної бази даних, ми просто симулюємо успішне замовлення
        // Повертаємо користувача на сторінку каталогу з повідомленням про успіх
        return redirect()->route('parts.index')
                         ->with('success', 'Дякуємо! Ваше замовлення успішно оформлено. Наш менеджер скоро зв\'яжеться з вами.');
    }
}