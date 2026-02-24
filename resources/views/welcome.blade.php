@extends('layouts.app')

@section('title', 'Головна сторінка')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Вітаємо у магазині «AutoParts»!</h1>
            <p class="col-md-8 fs-4">Найкращий вибір деталей для вашого автомобіля. Надійно, швидко та з гарантією.</p>
            <a href="{{ route('parts.index') }}" class="btn btn-primary btn-lg">Перейти до каталогу</a>
        </div>
    </div>
@endsection