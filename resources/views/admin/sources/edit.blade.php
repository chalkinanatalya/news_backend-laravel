@extends('layouts.admin')
@section('content')
    <h1>Edit Source</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">Header</label>
                <input type="text" id="title" value="{{ $source->title }}" class="form-control @error('title') is-invalid @enderror" name="title">
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <textarea id="url" class="form-control @error('url') is-invalid @enderror" name="url">{{ $source->url }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
