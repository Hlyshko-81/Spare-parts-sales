@extends('layouts.app')

@section('title', 'Деталі: ' . $part->name)

@section('content')
    <div class="card shadow-sm mt-4 border-info">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Детальна інформація (Адмін-режим)</h4>
        </div>
        <div class="card-body">
            <h2 class="card-title mb-3">{{ $part->name }}</h2>
            <hr>
            <p class="fs-5"><strong>ID в базі:</strong> {{ $part->id }}</p>
            <p class="fs-5"><strong>Сумісність:</strong> {{ $part->car }}</p>
            <p class="fs-5"><strong>Ціна:</strong> <span class="text-success fw-bold">{{ $part->price }} грн.</span></p>
            <p class="text-muted"><small>Додано в базу: {{ $part->created_at }}</small></p>
            
            <div class="mt-4">
                <a href="{{ route('admin.parts.index') }}" class="btn btn-outline-secondary">← Повернутися до таблиці</a>
                
                <form action="{{ route('admin.parts.destroy', $part->id) }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Ви дійсно хочете назавжди видалити цей запис?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити запис</button>
                </form>
            </div>
        </div>
    </div>
@endsection