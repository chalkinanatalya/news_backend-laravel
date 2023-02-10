@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Sources</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Header</th>
                  <th>URL</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @forelse($sourcesList as $source)
             <tr>
                 <td>{{ $source->id }}</td>
                 <td>{{ $source->title }}</td>
                 <td>{{ $source->url }}</td>
                 <td>{{ $source->created_at }}</td>
                 <td>{{ $source->updated_at }}</td>
                 <td><a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Change</a> &nbsp;
                    <a href="javascript:;" class="delete" rel="{{ $source->id }}" style="color: red;">Delete</a></td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $sourcesList->links() }}
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
                    send(`/admin/sources/${id}`).then(() => {
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
