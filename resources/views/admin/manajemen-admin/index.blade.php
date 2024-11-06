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
            <a href="{{ route('petugas.create') }}" class="btn btn-primary">+ Tambah Petugas / Admin</a>
        </div>

        <h4 class="card-title">Admin Management</h4>
        <h6 class="card-subtitle mb-3">Lihat data admin / petugas yang tersedia disini.</h6>

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Dibuat pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($petugas as $index => $item)
                        <tr>
                            <td>{{ $petugas->firstItem() + $index }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                            <td class="d-flex gap-2">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                
                                <form action="{{ route('petugas.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Petugas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('petugas.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" class="form-control" value="{{ $item->username }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
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
            {{ $petugas->links() }}
        </div>
    </div>
</div>

@endsection
