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
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Tambah Post</a>
        </div>

        <h4 class="card-title">Data Post Landing Page</h4>
        <h6 class="card-subtitle">Di sini Anda bisa melihat data postingan yang tersedia.</h6>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Dibuat pada Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $index => $post)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $post->judul }}</td>
                            <td>{{ $post->kategori->judul ?? 'Tidak ada kategori' }}</td>
                            <td>{{ $post->petugas->username ?? 'Tidak ada petugas' }}</td>
                            <td>
                                <span class="badge {{ strtolower($post->status) == 'publish' ? 'bg-success' : 'bg-warning' }} text-white">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Dibuat pada Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
