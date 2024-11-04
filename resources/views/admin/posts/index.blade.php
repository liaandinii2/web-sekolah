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
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ posts</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Dibuat pada tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $index => $post)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->title ?? 'Tidak ada kategori' }}</td>
                        <td>{{ $post->user->name ?? 'Tidak ada petugas' }}</td>
                        <td>
                            @if (Str::lower($post->status) == 'publish')
                                <span class="badge bg-success text-white">{{ Str::lcfirst($post->status) }}</span>
                            @else
                                <span class="badge bg-warning text-white">{{ $post->status }}</span>
                            @endif
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
                        <td colspan="7" class="text-center">Tidak ada data tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
