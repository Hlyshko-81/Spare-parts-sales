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
        $parts = Part::all();
        return view('admin.parts.index', compact('parts'));
    }

    // 2. Показати форму для створення нової запчастини (Create)
    public function create()
    {
        return view('admin.parts.create');
    }

    // 3. Перевірити дані та зберегти в базу (Store)
    public function store(Request $request)
    {
        // Валідація
        $validatedData = $request->validate([
            // Додали правило regex:/^[^\d]+$/ (забороняє будь-які цифри)
            'name' => 'required|string|max:255|regex:/^[^\d]+$/',
            'car' => 'required|string|max:255',
            'price' => 'required|numeric|gt:0',
        ], [
            'name.required' => 'Поле "Назва деталі" є обов\'язковим.',
            'name.regex' => 'Назва деталі не може містити цифри.', // <--- Повідомлення про помилку
            'car.required' => 'Вкажіть сумісність з автомобілем.',
            'price.required' => 'Вкажіть ціну товару.',
            'price.numeric' => 'Ціна має бути числом.',
            'price.gt' => 'Ціна повинна бути більшою за нуль.',
        ]);

        // Збереження в базу
        Part::create($validatedData);

        return redirect()->route('admin.parts.index')
                         ->with('success', 'Нову запчастину успішно додано до каталогу!');
    }

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