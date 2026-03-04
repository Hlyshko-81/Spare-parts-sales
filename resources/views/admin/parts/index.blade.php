@extends('layouts.app')

@section('title', 'Адмін-панель: Запчастини')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Управління запчастинами (Адмінка)</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Назва деталі</th>
                        <th>Сумісність (Авто)</th>
                        <th>Ціна</th>
                        <th class="text-center">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($parts as $part)
                        <tr>
                            <td>{{ $part->id }}</td>
                            <td>{{ $part->name }}</td>
                            <td>{{ $part->car }}</td>
                            <td>{{ $part->price }} грн</td>
                            <td class="text-center">
                                <a href="{{ route('admin.parts.show', $part->id) }}" class="btn btn-sm btn-info text-white">Перегляд</a>
                                
                                <form action="{{ route('admin.parts.destroy', $part->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Ви впевнені, що хочете видалити цю деталь?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">У базі даних поки немає запчастин.</td>
                        </tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
@endsection