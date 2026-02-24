@props(['item'])

<div class="card h-100 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">{{ $item['name'] }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Для авто: {{ $item['car'] }}</h6>
        <p class="card-text fs-5 text-success"><strong>{{ $item['price'] }} грн.</strong></p>
        <a href="{{ route('parts.show', $item['id']) }}" class="btn btn-primary btn-sm">Детальніше</a>
    </div>
</div>