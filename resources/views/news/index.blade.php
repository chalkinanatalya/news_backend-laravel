@extends('layouts.main')
@section('content')
    <div class="row mb-2">
@forelse($newsList as $news)
<div class="col-md-6">
    <div class="card flex-md-row mb-4 box-shadow h-md-850">
        <img src="{{ Storage::disk('public')->url($news->image) }}" style="width:200px;">

        <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">{{ $news->author }}</strong>
            <h3 class="mb-0" {{ $news->title }}>
                <a class="text-dark" href="{{ route('news.show', ['news' => $news]) }}">{{ $news->title }}</a>
            </h3>
            <p class="mb-0">
                {{ $news->categories->map(fn($item) => $item->title)->implode(' ') }}
            </p>
            <div class="mb-1 text-muted">{{ $news->status }}</div>
            <div class="mb-1 text-muted">{{ $news->created_at->format('d-m-Y H:i') }}</div>
            <p class="card-text mb-auto">{!! $news->description !!}</p>
            <a href="{{ route('news.show', ['news' => $news]) }}">Continue Reading</a>
        </div>
        {{-- <img class="card-img-right flex-auto d-none d-md-block" src="{{ Storage::disk('public')->url($news->image) }}" alt="Card image cap" width="200"> --}}
    </div>
</div>
@empty
    <h2>No fresh news</h2>
@endforelse
</div>
{{ $newsList->links() }}
@endsection
