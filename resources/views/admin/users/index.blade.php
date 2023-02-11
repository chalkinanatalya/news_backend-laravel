@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Admin Status</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @forelse($usersList as $users)
             <tr>
                 <td>{{ $users->id }}</td>
                 <td>{{ $users->name }}</td>
                 <td>{{ $users->email }}</td>
                 <td>{{ $users->is_admin }}</td>
                 <td><a href="{{ route('admin.users.edit', ['user' => $users]) }}">Change</a> &nbsp;</td>
             </tr>
            @empty
                <tr>
                    <td colspan="7">Empty</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $usersList->links() }}
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Do you confirm deleting user with #ID = ${id}`)) {
                    send(`/admin/users/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Deleting canceled");
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
