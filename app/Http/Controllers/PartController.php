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

    // Виведення списку всіх запчастин
    public function index()
    {
        $output = "<h1>Каталог запчастин</h1><ul>";
        foreach ($this->parts as $part) {
            $output .= "<li><a href='/parts/{$part['id']}'>{$part['name']}</a> - {$part['price']} грн.</li>";
        }
        $output .= "</ul>";
        
        return $output;
    }

    // Виведення однієї запчастини за ID
    public function show($id)
    {
        if (isset($this->parts[$id])) {
            $part = $this->parts[$id];
            return "<h1>Детальна інформація</h1>
                    <p><strong>Назва:</strong> {$part['name']}</p>
                    <p><strong>Автомобіль:</strong> {$part['car']}</p>
                    <p><strong>Ціна:</strong> {$part['price']} грн.</p>
                    <a href='/parts'>Повернутися до каталогу</a>";
        } else {
            abort(404, 'Запчастину не знайдено');
        }
    }
}