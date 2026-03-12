<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    // 1. Перегляд списку елементів (Index)
    public function index()
    {
        $parts = Part::all(); // Отримуємо всі запчастини з бази даних
        return view('admin.parts.index', compact('parts'));
    }

    // ==========================================
    // НОВЕ ЗАВДАННЯ: ФОРМИ ТА ВАЛІДАЦІЯ
    // ==========================================

    // 2. Показати форму для створення нової запчастини (Create)
    public function create()
    {
        return view('admin.parts.create');
    }

    // 3. Перевірити дані та зберегти в базу (Store)
    public function store(Request $request)
    {
        // Валідація (Перевірка даних)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',               // Обов'язкове, текст, макс 255 символів
            'car' => 'required|string|max:255',                // Обов'язкове, текст
            'price' => 'required|numeric|gt:0',                // Обов'язкове, число, більше нуля
        ], [
            // Власні повідомлення про помилки українською
            'name.required' => 'Поле "Назва деталі" є обов\'язковим.',
            'car.required' => 'Вкажіть сумісність з автомобілем.',
            'price.required' => 'Вкажіть ціну товару.',
            'price.numeric' => 'Ціна має бути числом.',
            'price.gt' => 'Ціна повинна бути більшою за нуль.',
        ]);

        // Збереження в базу
        Part::create($validatedData);

        // Flash-повідомлення та перенаправлення до таблиці
        return redirect()->route('admin.parts.index')
                         ->with('success', 'Нову запчастину успішно додано до каталогу!');
    }

    // ==========================================

    // 4. Перегляд деталей елементу (Show)
    public function show(Part $part)
    {
        return view('admin.parts.show', compact('part'));
    }

    // 5. Видалення елементу (Destroy)
    public function destroy(Part $part)
    {
        $part->delete(); 
        
        return redirect()->route('admin.parts.index')
                         ->with('success', 'Запчастину успішно видалено!');
    }
}