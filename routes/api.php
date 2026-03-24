<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PartController;

// Базові маршрути
Route::get('/parts', [PartController::class, 'index']);          
Route::get('/parts/{id}', [PartController::class, 'show']);      
Route::post('/parts/store', [PartController::class, 'store']);   

// Додаткове завдання (бонусні бали)
Route::put('/parts/{id}', [PartController::class, 'update']);    
Route::delete('/parts/{id}', [PartController::class, 'destroy']);