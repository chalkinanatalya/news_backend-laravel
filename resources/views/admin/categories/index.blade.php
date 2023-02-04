@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Header</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @forelse($categoriesList as $categories)
             <tr>
                 <td>{{ $categories->id }}</td>
                 <td>{{ $categories->title }}</td>
                 <td>{{ $categories->created_at }}</td>
                 <td>{{ $categories->updated_at }}</td>
                 <td><a href="">Change</a> &nbsp; <a href="" style="color: red;">Del.</a> </td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
