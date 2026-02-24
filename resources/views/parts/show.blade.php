@extends('layouts.app')

@section('title', $part['name'])

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Детальна інформація про запчастину</h4>
        </div>
        <div class="card-body">
            <h2 class="card-title mb-3">{{ $part['name'] }}</h2>
            <hr>
            <p class="card-text fs-5"><strong>Сумісність (Автомобіль):</strong> {{ $part['car'] }}</p>
            <p class="card-text fs-5"><strong>Ціна:</strong> <span class="text-success fw-bold">{{ $part['price'] }} грн.</span></p>
            
            <div class="mt-4">
                <a href="{{ route('parts.index') }}" class="btn btn-outline-secondary">← Повернутися до каталогу</a>
                <a href="{{ route('parts.checkout', $part['id']) }}" class="btn btn-success">Купити</a>
            </div>
        </div>
    </div>
@endsection