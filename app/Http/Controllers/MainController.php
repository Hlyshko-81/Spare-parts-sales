<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Головна сторінка (тепер підключає файл welcome.blade.php)
    public function index()
    {
        return view('welcome');
    }

    // Сторінка про проєкт (тепер підключає файл about.blade.php)
    public function about()
    {
        return view('about');
    }
}