@extends('admin.layout')

@section('content')

<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add User</a>
        </div>

        <h4 class="card-title">User Management</h4>
        <h6 class="card-subtitle mb-3">Lihat data pengguna yang tersedia disini.</h6>

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex gap-2">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">Edit</button>
                                
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
