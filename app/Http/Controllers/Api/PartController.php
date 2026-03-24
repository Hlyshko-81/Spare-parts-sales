<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PartController extends Controller
{
    private $parts = [
        "1" => [
            "name" => "Фільтр масляний",
            "price" => 150.00,
            "car" => "Toyota Camry",
            "desc" => "Оригінальний масляний фільтр.",
            "long_description" => "Забезпечує ідеальне очищення моторного масла від домішок..."
        ],
        "2" => [
            "name" => "Ремінь ГРМ",
            "price" => 627.50,
            "car" => "Volkswagen Passat",
            "desc" => "Ремінь газорозподільного механізму.",
            "long_description" => "Надійний ремінь ГРМ від німецького виробника Continental..."
        ],
        "3" => [
            "name" => "Масло моторне 5W-30",
            "price" => 900.00,
            "car" => "Universal",
            "desc" => "Синтетичне моторне масло.",
            "long_description" => "Високоякісне масло для сучасних двигунів. Об'єм 4 літри..."
        ],
        "4" => [
            "name" => "Гальмівні колодки",
            "price" => 450.00,
            "car" => "Honda Accord",
            "desc" => "Передні гальмівні колодки.",
            "long_description" => "Керамічні гальмівні колодки для ефективного гальмування..."
        ]
    ];

    public function index()
    {
        // Прибрали JSON_PRETTY_PRINT. Тепер браузер сам зробить все красиво!
        return response()->json($this->parts, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        if (!isset($this->parts[$id])) {
            return response()->json(['message' => 'Не знайдено'], 404, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json($this->parts[$id], 200, [], JSON_UNESCAPED_UNICODE);
    }
}