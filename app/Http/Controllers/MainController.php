<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Головна сторінка
    public function index()
    {
        return "<h1>Вітаємо у магазині «Автозапчастини»!</h1><p>Тут ви знайдете все для вашого авто.</p>";
    }

    // Сторінка про проєкт
    public function about()
    {
        return "<h1>Про нас</h1><p>Курсова робота: Система обліку автозапчастин. Студент: Глушко Данило.</p>";
    }
}