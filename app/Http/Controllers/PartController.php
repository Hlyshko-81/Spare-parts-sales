<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    // Відображення каталогу для звичайних покупців
    public function index()
    {
        $parts = Part::all();
        // Зверніть увагу: тут 'parts.index', а НЕ 'admin.parts.index'
        return view('parts.index', compact('parts')); 
    }

    // Перегляд однієї деталі
    public function show($id)
    {
        $part = Part::findOrFail($id);
        return view('parts.show', compact('part'));
    }

    // Сторінка оформлення замовлення
    public function checkout($id)
    {
        $part = Part::findOrFail($id);
        return view('parts.checkout', compact('part'));
    }

    // Обробка замовлення
    public function processCheckout(Request $request, $id)
    {
        // Поки що просто імітуємо успішне замовлення і повертаємо в каталог
        return redirect()->route('parts.index')
                         ->with('success', 'Дякуємо! Ваше замовлення успішно оформлено.');
    }
}