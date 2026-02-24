@extends('layouts.app')

@section('title', 'Каталог запчастин')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Каталог автозапчастин</h2>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($parts as $part)
            <div class="col">
                <x-card :item="$part" />
            </div>
        @endforeach
    </div>
    
@endsection