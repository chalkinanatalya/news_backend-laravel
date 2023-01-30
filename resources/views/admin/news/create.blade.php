@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Add News</h1>
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
           <label for="title">Header</label>
           <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
       </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
