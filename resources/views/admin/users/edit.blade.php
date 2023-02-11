@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <textarea id="email" class="form-control @error('email') is-invalid @enderror" name="email">{{ $user->email }}</textarea>
            </div>

            <div class="form-group">
                <label for="is_admin">Admin Status</label>
                <input type="range" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" min="0" max="1" value="{{$user->is_admin ? 1 : 0}}" step="1" style="width: 3%; padding: 0">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
