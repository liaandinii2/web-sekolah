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
            <a href="{{ route('galeri.create') }}" class="btn btn-primary">+ Tambah Galeri</a>
        </div>

        <h4 class="card-title">Galeri</h4>
        <h6 class="card-subtitle mb-3">List dari data galeri yang tersedia.</h6>

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul Post</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeris as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->post ? $item->post->judul : 'N/A' }}</td>
                            <td>{{ $item->position ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $item->status == 1 ? 'bg-success' : 'bg-warning' }} text-white">
                                    {{ $item->status == 1 ? 'Active' : 'Nonactive' }}
                                </span>
                            </td>
                            <td class="d-flex gap-2">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>           
                                <form action="{{ route('galeri.destroy', $item->id) }}" method="POST">
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
                                        <h5 class="modal-title">Edit Galeri</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('galeri.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label for="post_id">Judul Post</label>
                                                <select name="post_id" class="form-control" id="post_id" required>
                                                    <option value="">Select Post</option>
                                                    @foreach($posts as $post)
                                                        <option value="{{ $post->id }}" {{ $post->id == $item->post_id ? 'selected' : '' }}>
                                                            {{ $post->judul }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="position">Position</label>
                                                <select name="position" id="position" class="form-control" required>
                                                    <option value="">Select Position</option>
                                                    @for ($i = 1; $i <= 4; $i++)
                                                        <option value="{{ $i }}" {{ $i == $item->position ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="1" {{ $item->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ $item->status == '0' ? 'selected' : '' }}>Nonactive</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $galeris->links() }}
        </div>
    </div>
</div>

@endsection
