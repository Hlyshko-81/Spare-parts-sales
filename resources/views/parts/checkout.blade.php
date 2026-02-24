@extends('layouts.app')

@section('title', 'Оформлення замовлення')

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Оформлення замовлення</h4>
        </div>
        <div class="card-body">
            <h5>Обраний товар: <strong>{{ $part['name'] }}</strong></h5>
            <p class="fs-5">До сплати: <span class="text-success fw-bold">{{ $part['price'] }} грн.</span></p>
            <hr>
            
            <form action="{{ route('parts.processCheckout', $part['id']) }}" method="POST">
                @csrf <div class="mb-3">
                    <label for="name" class="form-label">Ваше ПІБ</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Іванов Іван Іванович" required>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Номер телефону</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+38 (099) 000-00-00" required>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Місто та відділення Нової Пошти</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Підтвердити замовлення</button>
                    <a href="{{ route('parts.show', $part['id']) }}" class="btn btn-outline-secondary btn-lg ms-2">Скасувати</a>
                </div>
            </form>
            
        </div>
    </div>
@endsection