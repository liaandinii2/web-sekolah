@extends('admin.layout')
@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah User</a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengguna</h4>
                    <h6 class="card-subtitle">Disini anda bisa melihat data pengguna yang tersedia.</h6>
                    <div class="table-responsive">
                        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th> <!-- Menampilkan nomor urut berdasarkan halaman -->
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <!-- Button to trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                                Edit
                                            </button>

                                            <!-- Delete button -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal for Editing -->
                                    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit Data Pengguna</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label for="title">Nama</label>
                                                    <input type="text" name="name" class="form-control" id="editTitle" value="{{ $user->name }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="title">Email</label>
                                                    <input type="text" name="email" class="form-control" id="editEmail" value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="title">Password</label>
                                                    <input type="text" name="password" class="form-control" id="editPassword" placeholder="kosongkan jika masih ingin menggunakan password lama">
                                                </div>
                                                <button type="submit" class="btn btn-primary d-block mt-3">Simpan</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

