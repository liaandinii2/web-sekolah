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
            <a href="{{ route('foto.create') }}" class="btn btn-primary">+ Tambah Foto</a>
        </div>

        <h4 class="card-title">Foto</h4>
        <h6 class="card-subtitle mb-3">List dari data Foto yang tersedia.</h6>

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>NO</th>
                        <th>ID GALERY</th>
                        <th>File</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fotos as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->galery_id ?? 'N/A' }}</td>
                            <td>{{ $item->file }}</td>
                            <td>{{ $item->judul }}</td>
                            <td class="d-flex gap-2">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>           
                                <form action="{{ route('foto.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Foto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('foto.update', $item->id) }}" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="form-group mb-3">
                                                <label for="galery_id">ID GALERY</label>
                                                <select name="galery_id" class="form-control" id="galery_id" required>
                                                    <option value="">Pilih Galery ID</option>
                                                    @foreach($galeris as $galeri)
                                                        <option value="{{ $galeri->id }}" {{ $item->galery_id == $galeri->id ? 'selected' : '' }}>
                                                            {{ $galeri->post->judul ?? 'No Title' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="files">File</label>
                                                <input type="file" name="files[]" class="form-control" id="files" multiple> <!-- Allows multiple uploads -->
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="judul">Judul</label>
                                                <input type="text" name="judul" class="form-control" id="judul" value="{{ $item->judul }}" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
            {{ $fotos->links() }}
        </div>
    </div>
</div>

@endsection
