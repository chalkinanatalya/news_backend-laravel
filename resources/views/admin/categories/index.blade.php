@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Header</th>
                  <th>Description</th>
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
                 <td>{{ $categories->description }}</td>
                 <td>{{ $categories->created_at }}</td>
                 <td>{{ $categories->updated_at }}</td>
                 <td><a href="{{ route('admin.categories.edit', ['category' => $categories]) }}">Change</a> &nbsp;
                <a href="javascript:;" class="delete" rel="{{ $categories->id }}" style="color: red;">Delete</a></td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $categoriesList->links() }}
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Do you confirm deleting category with #ID = ${id}`)) {
                    send(`/admin/categories/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Deleting cancelled");
                }
            });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
