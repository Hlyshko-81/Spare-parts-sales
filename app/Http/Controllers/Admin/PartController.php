<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    // 1. Перегляд списку елементів у таблиці (Index)
    public function index()
    {
        $parts = Part::all(); // Отримуємо всі запчастини з бази даних
        return view('admin.parts.index', compact('parts'));
    }

    // 2. Перегляд деталей елементу (Show) за допомогою Route Model Binding
    // Laravel автоматично знаходить запчастину за ID і передає її у змінну $part
    public function show(Part $part)
    {
        return view('admin.parts.show', compact('part'));
    }

    // 3. Видалення елементу (Destroy)
    public function destroy(Part $part)
    {
        $part->delete(); // Видаляємо запис із бази даних
        
        // Повертаємось на сторінку списку з повідомленням про успіх
        return redirect()->route('admin.parts.index')->with('success', 'Запчастину успішно видалено!');
    }
}