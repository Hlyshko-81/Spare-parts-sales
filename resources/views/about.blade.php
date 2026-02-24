@extends('layouts.app')

@section('title', 'Про проєкт')

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Про проєкт</h4>
        </div>
        <div class="card-body">
            <p class="lead">Курсова робота: Система обліку автозапчастин.</p>
            <p class="fs-5"><strong>Розробник:</strong> Глушко Данило.</p>
            <p class="fs-5"><strong>Група:</strong> ІСТ-23012Б.</p>
            <a href="{{ route('home') }}" class="btn btn-outline-primary mt-3">На головну</a>
        </div>
    </div>
@endsection