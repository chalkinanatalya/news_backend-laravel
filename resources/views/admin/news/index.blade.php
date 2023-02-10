@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Header</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Description</th>
                  <th>Post Date</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
             <tr>
                 <td>{{ $news->id }}</td>
                 <td>{{ $news->title }}</td>
                 <td>{{ $news->author }}</td>
                 <td>{{ $news->categories->map(fn($item) => $item->title)->implode(",") }}</td>
                 <td>{{ $news->status }}</td>
                 <td>{{ $news->description }}</td>
                 <td>{{ $news->created_at }}</td>
                 <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Change</a> &nbsp; <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: red;">Delete</a></td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Do you confirm deleting post with #ID = ${id}`)) {
                    send(`/admin/news/${id}`).then(() => {
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
