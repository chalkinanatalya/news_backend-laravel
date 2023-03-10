@extends('layouts.admin')
@section('title') Admin Pannel @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>

        </div>
    </div>


    <div class="table-responsive">
        <a href="{{ route('admin.parser') }}">Parse news</a>
    </div>
@endsection

