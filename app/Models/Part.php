<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    // Додаємо цей рядок: дозволяємо масово записувати ці поля в базу
    protected $fillable = ['name', 'car', 'price'];
}