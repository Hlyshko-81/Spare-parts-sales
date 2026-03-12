@extends('layouts.app')

@section('title', 'Додати нову запчастину')

@section('content')
    <div class="card shadow-sm mt-4 border-success">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Додати нову запчастину</h4>
        </div>
        <div class="card-body">
            
            <form action="{{ route('admin.parts.store') }}" method="POST">
                @csrf <div class="mb-3">
                    <label for="name" class="form-label">Назва деталі <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" 
                           value="{{ old('name') }}" 
                           placeholder="Наприклад: Гальмівні диски">
                    
                    @error('name')
                        <div class="invalid-feedback fw-bold">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="car" class="form-label">Сумісність (Авто) <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('car') is-invalid @enderror" 
                           id="car" name="car" 
                           value="{{ old('car') }}" 
                           placeholder="Наприклад: Skoda Octavia">
                    
                    @error('car')
                        <div class="invalid-feedback fw-bold">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Ціна (грн) <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('price') is-invalid @enderror" 
                           id="price" name="price" 
                           value="{{ old('price') }}" 
                           placeholder="0.00">
                    
                    @error('price')
                        <div class="invalid-feedback fw-bold">{{ $message }}</div>
                    @enderror
                </div>
                
                <hr>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-lg">💾 Зберегти запчастину</button>
                    <a href="{{ route('admin.parts.index') }}" class="btn btn-outline-secondary btn-lg ms-2">Скасувати</a>
                </div>
            </form>

        </div>
    </div>
@endsection