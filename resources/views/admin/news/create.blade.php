@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">News List</h1>
        <a href="{{ route('admin.news.create') }}">Add News</a>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
            <div class="form-group">
                <label for="category_ids">Category</label>
                <select class="form-control @error('category_ids[]') is-invalid @enderror" name="category_ids[]" id="category_ids" multiple>
                    <option value="0">--Select--</option>
                    @foreach($categories as $category)
                        <option @if((int)old('category_ids') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source_id">Source</label>
                <select class="form-control" name="source_id" id="source_id">
                    <option value="0">--Select--</option>
                    @foreach($sources as $source)
                        <option @if((int)old('source_id') === $source->id) selected @endif value="{{ $source->id }}">{{ $source->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="title">Header</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if(old('status') === $status) selected @endif>{{ $status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
